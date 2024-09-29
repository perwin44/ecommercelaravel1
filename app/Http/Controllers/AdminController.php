<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Notifications\SendEmailNotification;
use Illuminate\Http\Request;
use League\CommonMark\Extension\SmartPunct\EllipsesParser;
use PDF;
use Notification;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function view_category(){
        if((Auth::id()) && (Auth::User()->usertype == 1)){

        $data=Category::all();
        return view('admin.view_category',compact('data'));
    }
    else{
        return redirect('login');
    }
    }

    public function add_category(Request $request){
        if((Auth::id()) && (Auth::User()->usertype == 1)){
        $data=new Category;
        $data->category_name=$request->name;
        $data->save();
        return redirect()->back()->with('message','Category Added Successfully!');
    }
    else{
        return redirect('login');
    }
}

    public function delete_category($id){
        if((Auth::id()) && (Auth::User()->usertype == 1)){
        $data=Category::find($id);
        $data->delete();
        return redirect()->back()->with('message','Category Deleted Successfully!');
    }
    else{
        return redirect('login');
    }
}

    public function view_product(){
        if((Auth::id()) && (Auth::User()->usertype == 1)){
        $category=Category::all();
        return view('admin.view_product',compact('category'));
    }
    else{
        return redirect('login');
    }
}

    public function add_product(Request $request){
        if((Auth::id()) && (Auth::User()->usertype == 1)){
        $product=new Product;
        $product->title=$request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->quantity=$request->quantity;
        $product->discount_price=$request->discount_price;
        $product->category=$request->category;

        $image=$request->image;
        if($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product',$imagename);
            $product->image=$imagename;
        }

        $product->save();
        return redirect()->back()->with('message','Product Added Successfully!');
    }
    else{
        return redirect('login');
    }
}

    public function show_product(){
        if((Auth::id()) && (Auth::User()->usertype == 1)){
        $product=Product::all();
        return view('admin.show_product',compact('product'));
    }
    else{
        return redirect('login');
    }
}
    public function delete_product($id){
        if((Auth::id()) && (Auth::User()->usertype == 1)){
        $product=Product::find($id);
        $product->delete();
        return redirect()->back()->with('message','Product Deleted Successfully!');
    }
    else{
        return redirect('login');
    }
}

    public function update_product($id){
        if((Auth::id()) && (Auth::User()->usertype == 1)){
        $product=Product::find($id);
        $category=Category::all();
        return view('admin.update_product',compact('product','category'));
    }
    else{
        return redirect('login');
    }
}

    public function update_product_confirm(Request $request,$id){
        if((Auth::id()) && (Auth::User()->usertype == 1)){
        $product=Product::find($id);
        $product->title=$request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->quantity=$request->quantity;
        $product->discount_price=$request->discount_price;
        $product->category=$request->category;

        $image=$request->image;
        if($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product',$imagename);
            $product->image=$imagename;
        }

        $product->save();
        return redirect()->back()->with('message','Product Updated Successfully!');
    }
    else{
        return redirect('login');
    }
}

    public function order(){
        if((Auth::id()) && (Auth::User()->usertype == 1)){
        $order=Order::all();
        return view('admin.order',compact('order'));
    }
    else{
        return redirect('login');
    }
}

    public function delivered($id){
        if((Auth::id()) && (Auth::User()->usertype == 1)){
        $order=Order::find($id);
        $order->delivery_status='Delivered';
        $order->payment_status='Paid';
        $order->save();
        return redirect()->back()->with('message','Order Delivered Successfully!');
    }
    else{
    return redirect('login');
    }
}

    public function print_pdf($id){
        if((Auth::id()) && (Auth::User()->usertype == 1)){
        $order=Order::find($id);
        $pdf=PDF::loadView('admin.pdf',compact('order'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('order_details.pdf');
    }
    else{
        return redirect('login');
    }
}

    public function send_email($id){
        if((Auth::id()) && (Auth::User()->usertype == 1)){
        $order=Order::find($id);
        return view ('admin.send_email',compact('order'));
    }
    else{
        return redirect('login');
    }
}

    public function send_user_email(Request $request,$id){
        if((Auth::id()) && (Auth::User()->usertype == 1)){
        $order=Order::find($id);
        $details=[
            'greeting'=> $request->greeting,
            'firstline'=>$request->firstline,
            'body'=>$request->body,
            'button'=>$request->button,
            'url'=>$request->url,
            'lastline'=>$request->lastline,
        ];
        Notification::send($order,new SendEmailNotification($details));
        return redirect()->back();
    }
    else{
    return redirect('login');
    }
}

    public function search(Request $request){
        if((Auth::id()) && (Auth::User()->usertype == 1)){
        $searchText=$request->search;
        $order=Order::where('name','LIKE',"%$searchText%")->orWhere('phone','LIKE',"%$searchText%")->orWhere('product_title','LIKE',"%$searchText%")->get();
        return view('admin.order',compact('order'));
    }
    else{
    return redirect('login');
    }
}

}
