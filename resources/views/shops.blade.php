<style type="text/css">
  [slider] {
  width: 300px;
  position: relative;
  height: 5px;
  margin: 45px 0 10px 0;
}

[slider] > div {
  position: absolute;
  left: 13px;
  right: 15px;
  height: 5px;
}
[slider] > div > [inverse-left] {
  position: absolute;
  left: 0;
  height: 5px;
  border-radius: 10px;
  background-color: #CCC;
  margin: 0 7px;
}

[slider] > div > [inverse-right] {
  position: absolute;
  right: 0;
  height: 5px;
  border-radius: 10px;
  background-color: #CCC;
  margin: 0 7px;
}


[slider] > div > [range] {
  position: absolute;
  left: 0;
  height: 5px;
  border-radius: 14px;
  background-color: #d02128;
}

[slider] > div > [thumb] {
  position: absolute;
  top: -7px;
  z-index: 2;
  height: 20px;
  width: 20px;
  text-align: left;
  margin-left: -11px;
  cursor: pointer;
  box-shadow: 0 3px 8px rgba(0, 0, 0, 0.4);
  background-color: #FFF;
  border-radius: 50%;
  outline: none;
}

[slider] > input[type=range] {
  position: absolute;
  pointer-events: none;
  -webkit-appearance: none;
  z-index: 3;
  height: 14px;
  top: -2px;
  width: 100%;
  opacity: 0;
}

div[slider] > input[type=range]:focus::-webkit-slider-runnable-track {
  background: transparent;
  border: transparent;
}

div[slider] > input[type=range]:focus {
  outline: none;
}

div[slider] > input[type=range]::-webkit-slider-thumb {
  pointer-events: all;
  width: 28px;
  height: 28px;
  border-radius: 0px;
  border: 0 none;
  background: red;
  -webkit-appearance: none;
}

div[slider] > input[type=range]::-ms-fill-lower {
  background: transparent;
  border: 0 none;
}

div[slider] > input[type=range]::-ms-fill-upper {
  background: transparent;
  border: 0 none;
}

div[slider] > input[type=range]::-ms-tooltip {
  display: none;
}

[slider] > div > [sign] {
  opacity: 0;
  position: absolute;
  margin-left: -11px;
  top: -39px;
  z-index:3;
  background-color: #d02128;
  color: #fff;
  width: 28px;
  height: 28px;
  border-radius: 28px;
  -webkit-border-radius: 28px;
  align-items: center;
  -webkit-justify-content: center;
  justify-content: center;
  text-align: center;
}

[slider] > div > [sign]:after {
  position: absolute;
  content: '';
  left: 0;
  border-radius: 16px;
  top: 19px;
  border-left: 14px solid transparent;
  border-right: 14px solid transparent;
  border-top-width: 16px;
  border-top-style: solid;
  border-top-color: #d02128;
}

[slider] > div > [sign] > span {
  font-size: 12px;
  font-weight: 700;
  line-height: 28px;
}

[slider]:hover > div > [sign] {
  opacity: 1;
}
</style>
<html>
 <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Rexx System Coding Challenge</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
 </head>
 <body>
  <div class="container">    
     <br />
     <h3 align="center">Rexx System Coding Challenge</h3>
     <br />
            <br />
            <div class="row">
                <div class="col-md-4">
                    <input type="text" name="customer_name" id="customer_name" class="form-control" placeholder="Customer Name"  />
                </div>
                <div class="col-md-4">
                    <select class="form-control" id="product_id" name="product_id">
                      <option value="0">Select Your Product</option>
                      @if(!empty($product) && count($product) > 0) 
                          @foreach($product ?? '' as $products)
                          <option value="{{ $products->product_id }}">{{ $products->product_name }}</option>
                          @endforeach
                      @endif
                    </select>
                </div>
                <div slider id="slider-distance">
                  <div>
                    <div inverse-left style="width:70%;"></div>
                    <div inverse-right style="width:70%;"></div>
                    <div range style="left:0%;right:0%;"></div>
                    <span thumb style="left:0%;"></span>
                    <span thumb style="left:100%;"></span>
                    <div sign style="left:0%;">
                      <span id="value">0</span>
                    </div>
                    <div sign style="left:100%;">
                      <span id="value">100</span>
                    </div>
                  </div>
                  <input type="range" name="price_min" id="price_min" value="0" max="100" min="0" step="1" oninput="
                  this.value=Math.min(this.value,this.parentNode.childNodes[5].value-1);
                  let value = (this.value/parseInt(this.max))*100
                  var children = this.parentNode.childNodes[1].childNodes;
                  children[1].style.width=value+'%';
                  children[5].style.left=value+'%';
                  children[7].style.left=value+'%';children[11].style.left=value+'%';
                  children[11].childNodes[1].innerHTML=this.value;" />

                  <input type="range" name="price_max" id="price_max" value="100" max="100" min="0" step="1" oninput="
                  this.value=Math.max(this.value,this.parentNode.childNodes[3].value-(-1));
                  let value = (this.value/parseInt(this.max))*100
                  var children = this.parentNode.childNodes[1].childNodes;
                  children[3].style.width=(100-value)+'%';
                  children[5].style.right=(100-value)+'%';
                  children[9].style.left=value+'%';children[13].style.left=value+'%';
                  children[13].childNodes[1].innerHTML=this.value;" />
                </div>
                <div class="col-md-4">
                    <button type="button" name="filter" id="filter" class="btn btn-primary">Filter</button>
                    <button type="button" name="refresh" id="refresh" class="btn btn-default">Refresh</button>
                </div>
            </div>
            <br />
   <div class="table-responsive">
    <table class="table table-bordered table-striped" id="order_table">
           <thead>
            <tr>
                <th>Sale ID</th>
                <th>Customer Name</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Sale Date</th>
            </tr>
           </thead>
           <tfoot>
            <tr>
                <th colspan="3" style="text-align:right">Total:</th>
                <th></th>
                <th></th>
            </tr>
          </tfoot>
       </table>
   </div>
  </div>
 </body>
</html>

<script>
$(document).ready(function(){

 load_data();

 function load_data(customer_name = '', product_id = '',price_min = '', price_max = '')
 {
  $('#order_table').DataTable({
   processing: true,
   serverSide: true,
   ajax: {
    url:'{{ route("shops.index") }}',
    data:{customer_name:customer_name, product_id:product_id, price_min:price_min, price_max:price_max}
   },
   columns: [
    {
     data:'sale_id',
     name:'sale_id'
    },
    {
     data:'customer_name',
     name:'customer_name'
    },
    {
     data:'product_name',
     name:'product_name'
    },
    {
     data:'product_price',
     name:'product_price'
    },
    {
    data: 'sale_date',
    name: 'sale_date'
    }
   ],
   "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // Total over all pages
            total = api
                .column( 3 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 3, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            $( api.column( 3 ).footer() ).html(
                Math.round(pageTotal * 100) / 100 // (round at most 2 decimal places, but only if necessary)
            );
        }
  });
 }

 $('#filter').click(function(){
  var customer_name = $('#customer_name').val();
  var product_id = $('#product_id').val();
  var price_min = $('#price_min').val();
  var price_max = $('#price_max').val();
  if(customer_name != '' || product_id != '' || price_min || price_max)
  {
   $('#order_table').DataTable().destroy();
   load_data(customer_name,product_id,
                            price_min,price_max);
  }
 });

 $('#refresh').click(function(){
  $('#customer_name').val('');
  $('#product_name').val('');
  $('#order_table').DataTable().destroy();
  load_data();
 });

});
</script>
