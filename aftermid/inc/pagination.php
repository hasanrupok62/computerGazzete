<?php 
/**
* 
*/
class Pagination
{
  
  function __construct()
  {
  }
  function Page($page){ ?>
  <?php
  $con=new mysqli("127.0.0.1","root","","hatbazar"); 
  $pagin= "SELECT * FROM products_list";
  $result=$con->query($pagin);
  $count=$result->num_rows;
  $count=$count/12;
  $count=ceil($count);
   ?>
  <section class="container">
       <nav aria-label="Page navigation">
    <ul class="pagination">
      <?php for ($i=1; $i <= $count; $i++) { ?>
        <?php if ($i==1) {?>
        <li>
          <a href="<?php echo $page.$i; ?>" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        <?php } ?>
        <li><a href="<?php echo $page.$i; ?>"><?php echo $i; ?></a></li>
        <?php if ($i==$count) {?>
        <li>
          <a href="<?php echo $page; ?><?php echo $i; ?>" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
        <?php } ?>
      <?php } ?>
    </ul>
  </nav>
  </section>
  <?php }
}


 ?>