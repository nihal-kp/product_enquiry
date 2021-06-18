<!DOCTYPE html>
<html>
<head>
    <title>Simple Product Enquiry System</title>
</head>
<body>
    <h3>A customer sent an enquiry</h3>
    <p><b>Product Name:</b> {{ $details['product_name'] }}</p>
    <p><b>Product Price:</b> {{ $details['product_price'] }}</p>
    <p><b>Customer Name:</b> {{ $details['customer_name'] }}</p>
    <p><b>Customer Email:</b>  {{ $details['customer_email'] }}</p>
    <p><b>Enquiry:</b>  {{ $details['enquiry'] }}</p>

    <p>Thank you</p>

    <p><i>Regards,<br>
    &nbsp;&nbsp; Product Testing Team.<br>
    &nbsp;&nbsp; email: product@test.com<br>
    &nbsp;&nbsp; mobile: 9999912345</i></p>
</body>
</html>