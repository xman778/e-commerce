
<!DOCTYPE h2tml>
<html>
<head>
    <title>Generate and Save PDF  </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
</head>
<body >

    
        <h1>order details</h1>
        @foreach($pro as $product)
        
                       
        name : <h2>{{$product->name}}</h2>
        address : <h2>{{$product->address}}</h2>
        email : <h2>{{$product->email}}</h2>
        phone : <h2>{{$product->phone}}</h2>
        quantity : <h2>{{$product->quantity}}</h2>
        product_title : <h2>{{$product->product_title}}</h2>
        price : <h2>{{$product->price}}</h2>
        payment_statment : <h2>{{$product->payment_statment}}</h2>

        
         @endforeach
        
   
</body>
</html>