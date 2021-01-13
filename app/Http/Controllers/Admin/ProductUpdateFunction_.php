    public function update(Request $request, $id)
    {


        $product = Product::findorfail($id);
        $product->admin_id = $request->user_id;
        $product->vendor_id = Null;
        $product->merchant_id = Null;
        $product->importer_id = Null;
        $product->name = $request->name;
        $product->brand_id = $request->brand_id;

        $product->buying_price = $request->buying_price;
        $product->market_price = $request->market_price;
        $product->sell_price = $request->sell_price;

        $image = $request->file('image');
        if($image)
        {
            $image_name=str::random(5);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name. '.' .$ext;
            $upload_path = 'images/product_image/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if($success)
            {
                $old_image = $request->old_image;
                if (file_exists($old_image)) {
                    unlink($request->old_image);
                }
                
                $product->image = $image_url;
            }
        }

        $product->qty = $request->qty;
        $product->description = $request->description;
        $product->note = $request->note;
        $product->status = $request->status;
        if ($request->product_veriation) {
            $product->product_veriation = $request->product_veriation;
        }
        $product->save();

        $ProductCategory = Product_category::where('product_id', $id)->delete();
        $category_id = $request->category_id;
        if ($category_id) {
            foreach ($category_id as $key => $value ){
                $product_category = new Product_category();
                $product_category->product_id =$product->id;
                $product_category->category_id=$value;
                $product_category->save();
            }   
        }


        // old attribute delete
        $ProductAttributes = Product_attribute::where('product_id', $id)->get();

        if ($ProductAttributes) {
            foreach ($ProductAttributes as $key => $product_attribute ){
                if ($product_attribute) {
                    Product_attribute_attribute_value::where('product_attribute_id', $product_attribute->id)->delete();
                }
                $product_attribute->delete();
            }   
        }

        $attribute_id= $request->attribute_id;
        if ($attribute_id) {
            foreach ($attribute_id as $key => $value ){
                $product_attribute = new Product_attribute();
                $product_attribute->product_id =$product->id;
                $product_attribute->attribute_id=$value;
                $product_attribute->save();


                $attribute_value_id= $request->attribute_value_id;
                if ($attribute_value_id) {
                    $product_attribute_value = new Product_attribute_attribute_value();
                    $product_attribute_value->product_attribute_id =$product_attribute->id;
                    $product_attribute_value->attribute_value_id=$attribute_value_id[$key];
                    $product_attribute_value->save();
                }


            }   
        }



        // $ProductSize = Product_size::where('product_id', $id)->delete();
        // $size_id = $request->size_id;
        // if ($size_id) {
        //     foreach ($size_id as $key => $value ){
        //         $product_size = new Product_size();
        //         $product_size->product_id =$product->id;
        //         $product_size->size_id=$value;
        //         $product_size->save();
        //     }   
        // }

        // $ProductColor = Product_color::where('product_id', $id)->delete();
        // $color_id = $request->color_id;
        // if ($color_id) {
        //     foreach ($color_id as $key => $value ){
        //         $product_color = new Product_color();
        //         $product_color->product_id =$product->id;
        //         $product_color->color_id=$value;
        //         $product_color->save();
        //     } 
        // }

        if ($request->product_image) {
            $ProductImage = Product_image::where('product_id', $id)->delete();        
            $image = $request->file('product_image');
            if($image){
                    foreach ($image as $value ){
                    $product_image = new Product_image();
                    $image_name=str::random(5);
                    $ext = strtolower($value->getClientOriginalExtension());
                    $image_full_name = $image_name. '.' .$ext;
                    $upload_path = 'images/product_more_image/';
                    $image_url = $upload_path.$image_full_name;
                    $success = $value->move($upload_path, $image_full_name);
                    $product_image->product_id = $product->id;
                    $product_image->product_image = $image_url;
                    // if ($request->old_product_image) {
                    //  unlink($request->old_product_image);
                    // }
                    $product_image->save();
                 }
            }
        }


        $var_attribute_id = $request->var_attribute_id;
        $var_attribute_value_id = $request->var_attribute_value_id;
        $var_attribute_id2 = $request->var_attribute_id2;
        $var_attribute_value_id2 = $request->var_attribute_value_id2;
        $var_price = $request->var_price;

        $var_img = $request->file('var_img');
        if ($var_attribute_id) {
            $update = false;
            if ($request->hasFile('var_img')) {
                Product_variation::where('product_id', $id)->delete();
                $product_variation = new Product_variation();
            }else {
                $update = true;
                $product_variation = Product_variation::where('product_id', $id)->get();
            }
            foreach ($var_attribute_id as $key => $value ){

                

                $product_variation[$key]->product_id = $product->id;
                $product_variation[$key]->var_attribute_id = $value;


                $product_variation[$key]->var_attribute_value_id = $var_attribute_value_id[$key];
                $product_variation[$key]->var_attribute_id2 = $var_attribute_id2[$key];
                $product_variation[$key]->var_attribute_value_id2 = $var_attribute_value_id2[$key];
                $product_variation[$key]->var_price = $var_price[$key];

                if($request->hasFile('var_img.'.$key)){

                    $image_name=str::random(5);
                    $ext = strtolower($var_img[$key]->getClientOriginalExtension());
                    $image_full_name = $image_name. '.' .$ext;
                    $upload_path = 'images/product_variation_image/';
                    $image_url = $upload_path.$image_full_name;
                    $success = $var_img[$key]->move($upload_path, $image_full_name);

                    $product_variation[$key]->var_img = $image_url;

                    if ($request->old_var_img) {
                     unlink($request->old_var_img);
                    }

                }

                if ($update) {
                    $product_variation[$key]->update();
                } else {
                    $product_variation[$key]->save();
                }
            } 
        }
    
        $notification=array(
            'message' => 'Product Updated Successfully !!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }