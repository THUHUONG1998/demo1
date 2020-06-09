 <!-- Main Container -->
 <?php  
  // print_r($data);exit;
 ?>
 <section class="main-container col1-layout">
    <div class="main container">
      <div class="col-main">
        <div class="cart">
          
          <div class="page-content page-order"><div class="page-title">
            <h2>Shopping Cart</h2>
          </div>
            
            
            <div class="order-detail-content">
              <div class="table-responsive">
                <table class="table table-bordered cart_summary">
                  <thead>
                    <tr>
                      <th class="cart_product">Product</th>
                      <th>Description</th>
                      <th>Avail.</th>
                      <th>Unit price</th>
                      <th>Qty</th>
                      <th>Total</th>
                      <th  class="action"><i class="fa fa-trash-o"></i></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach($data['datacart']->items as $key=>$value ) : ?>
                    <tr>
                      <td class="cart_product"><a href="#"><img src="public/sources/products-images/<?php echo  $value['item']->image; ?>" alt="Product"></a></td>
                      <td class="cart_description"><p class="product-name"><a href="#"><?php  echo $value['item']->name;?> </a></p>
                      
                      <td class="availability in-stock"><span class="label">In stock</span></td>
                      <td class="price"><span>
                      <?php  echo number_format($value['item']->promotion_price, 0, ',', ' ').'VND' ; ?>
                      <br>
                      <del style = "color: #8888"> <?php echo number_format($value['item']->price, 0, ',', ' ').'VND' ; ?> </del>
                      </span></td>
                      <td class="qty">
                        <div class="input-group">
                          <span class="input-group-btn">
                            <input name="quant[2]" class="form-control input-number" value="<?php echo $value['qty']; ?>" type="text"> 
                           
                          </span>
                        </div>
                        <!-- <input class="form-control input-sm" type="text" value="<?php //echo $value['qty']; ?>">                     -->
                        <br>
                        <button type= "sumbit" class = "Yes">Đồng ý</button>
                      </td>
                      <td class="price"><span><?php echo number_format($value['item']->price*$value['qty'], 0, ',', ' ').'VND'; ?></span>
                     
                      </td>
                      <td  ><a class ="action" href="#" data-id="<?php echo $value['item']->id; ?>"><i class="icon-close"></i></a></td>
                    </tr>
                 <?php endforeach;?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="2" rowspan="2"></td>
                      <td colspan="3">Total products</td>
                      <td colspan="2"><?php echo number_format( $data['datacart']->promtPrice, 0, ',', ' ').'VND' ;?> </td>
                    </tr>
                    <tr>
                      <td colspan="3"><strong>Total</strong></td>
                      <td colspan="2"><strong><?php echo number_format( $data['datacart']->totalPrice, 0, ',', ' ').'VND' ;?> </strong></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <div class="cart_navigation"> <a class="continue-btn" href="#"><i class="fa fa-arrow-left"> </i>&nbsp; Continue shopping</a> <a class="checkout-btn" href="#"><i class="fa fa-check"></i> Proceed to checkout</a> </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  