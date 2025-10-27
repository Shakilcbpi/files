<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Simple Cart</title>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<style>
    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
    th, td { border: 1px solid #ccc; padding: 10px; text-align: center; }
    input { width: 40px; text-align: center; }
    button { padding: 5px 10px; }
</style>
</head>
<body>

<h2>Shopping Cart</h2>

<table>
    <thead>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Subtotal</th>
            <th>Action</hh>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Product 1</td>
            <td>
                <button class="decrement">-</button>
                <input type="text" value="1" readonly>
                <button class="increment">+</button>
            </td>
            <td class="price">50</td>
            <td class="subtotal">50</td>
            <td><button class="remove">Remove</button></td>
        </tr>
        <tr>
            <td>Product 2</td>
            <td>
                <button class="decrement">-</button>
                <input type="text" value="2" readonly>
                <button class="increment">+</button>
            </td>
            <td class="price">80</td>
            <td class="subtotal">160</td>
            <td><button class="remove">Remove</button></td>
        </tr>
    </tbody>
</table>

<h3>Grand Total: $<span id="grandTotal">210</span></h3>

<script>
document.addEventListener('DOMContentLoaded', function () {
 const incrementButtons= document.querySelectorAll('.increment');
 const decrementButtons = document.querySelectorAll('.decrement');
 const grandTotalElement = document.getElementById('grandTotal');
   const removeButtons = document.querySelectorAll('.remove');
 

  function updateSubtotal(row){
    const price = parseInt(row.querySelector('.price').textContent);
    const quantity = parseInt(row.querySelector('input').value);
    const subtotal = price*quantity;
    row.querySelector('.subtotal').textContent = subtotal; 
    return subtotal;
  }

   function grandTotal(){
       let grandTotal = 0;
        document.querySelectorAll('tbody tr').forEach(function(row){
            const subtotal = parseInt(row.querySelector('.subtotal').textContent);
            grandTotal += subtotal;
        });
        grandTotalElement.textContent=grandTotal;
       
   }


   incrementButtons.forEach(function(btn){
         btn.addEventListener('click',function(){
             const input= this.parentElement.querySelector('input');
             input.value=parseInt(input.value)+1;
              const row=this.closest('tr');
              updateSubtotal(row);
              grandTotal();
         });
         
   });

   decrementButtons.forEach(function(btn){
     btn.addEventListener('click',function(){
        const input = this.parentElement.querySelector('input');
        if(input.value>1){
               input.value=parseInt(input.value)-1;
               const row=this.closest('tr');
                updateSubtotal(row);
                grandTotal();
        }
        
     });
   });

   removeButtons.forEach(function(btn){
        btn.addEventListener('click',function(){
            const row = this.closest('tr');
            row.remove();
            grandTotal();
        });
   });
  
});
</script>


</body>
</html>
