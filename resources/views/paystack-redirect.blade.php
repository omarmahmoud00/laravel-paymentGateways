<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>paystack payment</title>
    {{-- <script src="https://js.paystack.co/v1/inline.js"></script> --}}

</head>
<body> 
     
      <script src="https://js.paystack.co/v1/inline.js"></script>

      <script>
       document.addEventListener("DOMContentLoaded", (event) => {
            payWithPaystack();

        });
 
        function payWithPaystack(e) {
        // e.preventDefault();

        let handler = PaystackPop.setup({
            key: '{{ config("paystack.public_key") }}', // Ensure that this config value is correct
            email: 'user@gamil.com' ,
            currency:'ZAR',
            amount: 40*100,
             onClose: function(){
            alert('Window closed.');
            },
            callback: function(response){
                // console.log(response);
                window.location.href = response.redirecturl;
            }
        });

        handler.openIframe();
        }

      </script>
</body>
</html>