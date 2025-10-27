<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<style>
   table, th, td {
  border: 1px solid green;
}
</style>
</head>
<body>
    <h1>Shopping Cart</h1>

    <table>
        <thead>
           <tr>
             <th> Product name</th> 
             <th> Quantity </th>
             <th> Price </th>
             <th> Sub Total </th>
             <th> Action </th>
           </tr>
        </thead>
        <tbody>
          <tr>
            <td> Product 1 </td> 
            <td>
                <button class="decrement">-</button>
                <input type="text" value="1" readonly>
                <button class="increment">+</button>
            </td>
            <td class="price"> 80</td>
            <td class="subtotal"> 80</td>
            <td><button class="remove">Remove</button></td>
          </tr>
          <tr>
            <td> Product 2 </td> 
            <td>
                <button class="decrement">-</button>
                <input type="text" value="2" readonly>
                <button class="increment">+</button>
            </td>
            <td class="price"> 100</td>
            <td class="subtotal"> 200</td> 
            <td><button class="remove">Remove</button></td>
          </tr>
        </tbody>
    </table>

    <h1>Grand Total: <span id="grandTotal">380</span></h1>
</body>

<script>
    document.addEventListener('DOMContentLoaded',function(){
        const incrementButtons = document.querySelectorAll('.increment');
        const decrementButtons = document.querySelectorAll('.decrement');
        const grantTotalElement = document.getElementById('grandTotal');
        const removeElement = document.querySelectorAll('.remove');

       
       

        function subTotal(row){
           const price = parseInt(row.querySelector('.price').textContent);
           const quantity = parseInt(row.querySelector('input').value);
           const subTotal = price*quantity;
            row.querySelector('.subtotal').textContent = subTotal;
            return subTotal;
        }

         function grantTotal(){
            let grantTotalvalue = 0;
            document.querySelectorAll('tbody tr').forEach(function(row){
                 const subTotal = parseInt(row.querySelector('.subtotal').textContent);
                 grantTotalvalue +=subTotal;
            });
            grantTotalElement.textContent=grantTotalvalue;
        }
        
        incrementButtons.forEach(function(btn){
            btn.addEventListener('click',function(){
               const input = this.parentElement.querySelector('input');
                 input.value = parseInt(input.value)+1;
                 const row = this.closest('tr');
                 subTotal(row);
                  grantTotal();
            });
        });

        decrementButtons.forEach(function(btn){
             btn.addEventListener('click',function(){
                const input = this.parentElement.querySelector('input');
                 if(input.value>1){
                 input.value = parseInt(input.value)-1;
               }
                const row = this.closest('tr');
                 subTotal(row);
                  grantTotal();
             });
        });

        removeElement.forEach(function(btn){
             btn.addEventListener('click',function(){
                 const row = this.closest('tr');
                 row.remove();
                 grantTotal();
             });
        });

    });
</script>
</html>