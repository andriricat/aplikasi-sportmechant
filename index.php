<?php
require  'header.php';
?>
<!-- parallax -->

<div class="rubypedia-parallax">
  <div class="container" style="text-align: center;padding-top: 160px">
    <div class="row">
      <!-- <span class="border" style="margin-left: 300px; color: white;padding: 18px;font-weight: bold; font-family: verdana; font-size: 25px;letter-spacing: 5px;">Shop</span><br> -->
      <span class="border" style="font-weight: bold; color: white; padding: 18px;font-size: 60px;letter-spacing: 10px;">Toko Olahraga</span><br><br><br>
      <span class="border" style="background-color: #111;color: #fff;padding: 18px;font-size: 25px;letter-spacing: 10px;">Berkualitas dan Murah</span>
    </div>
  </div>
</div>
<!-- Home -->
<div>
  <section style="min-height:450px;" id="home">
    <div style="margin: 5px auto;" class="container">
      <div class="row">
        <div class="col-md-12" style="margin-top: 2vw;">
          <h2 class="text-left" style="margin-bottom: 0;  display: contents;">Toko</h2>
          <a href="list_outlet.php" style="float: right; position: absolute;  right: 0;  color: #3876f1;  font-family: cursive;  font-size: 1.25vw;">Lihat Semua Outlet >>>> </a>
          <!-- <hr style="width: 100%;"> -->
        </div>
      </div>
      <br>
      <?php $i = 1; ?>
      <?php foreach ($list_all_outlet as $row) : ?>
        <a href="outlet_detail.php?id_outlet=<?php echo $row['id_outlet']; ?>">
          <div class="col-md-4 " id="" style="margin-top: 1vw;">
            <div class="span4 " style="border: 1px solid #a0a0a000;border-radius: 10px; box-shadow: 0px 7px 10px 1px rgba(222,111,183,0.9);">
              <div class="icons-box">
                <div class="title">
                  <h3><?php echo $row['name_outlet']; ?></h3>
                </div>
                <img style=" min-height: 220px; max-height: 220px; border-radius: 10px; min-width: 250px; max-width: -webkit-fill-available;" src="img/<?php echo $row['image_outlet']; ?>" />
                <div>
                  <!-- <h4 class="product-price" style="margin-top: 10px;">Rp.<?php echo number_format($row['price']); ?></h4> -->
                  <h5 style="color:#0a130aa6"> <?= $row['city'] ?></h5>
                </div>
              </div>
            </div>

          </div>
        </a>
        <?php $i++; ?>
      <?php endforeach; ?>

    </div>

  </section>
</div>
<section class="home" id="home">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2 class="text-center">Produk Terbaru </h2> <span><a href="product.php" style="float: right; position: absolute;  right: 0;  color: #3876f1;  font-family: cursive;  font-size: 1.25vw;">Lihat Semua Product >>>> </a> </span>
        <hr>
      </div>
    </div>
    <br>
    <?php $i = 1; ?>
    <?php foreach ($list_barang as $row) : ?>
      <a href="detailproduk.php?kd=<?php echo $row['id_product']; ?>">
        <div class="col-md-4 " id="">
          <div class="span4 " style="border: 1px solid #a0a0a000;border-radius: 10px; box-shadow: 0px 7px 10px 1px rgba(155,219,183,0.9);">
            <div class="icons-box">
              <!-- <div class="title">
                <h3><?php echo $row['name_product']; ?></h3>
              </div> -->
              <img style=" min-height: 220px; max-height: 220px; border-radius: 10px; min-width: 250px; max-width: -webkit-fill-available;" src="img/<?php echo $row['foto']; ?>" />
              <div class="product-label">
                <span class="new">BARU</span>
              </div>
              <div style="text-align: left;">
                <h3><?php echo $row['name_product']; ?></h3>
                <h4 class="product-price" style="margin-top: 10px;">Rp.<?php echo number_format($row['price']); ?></h4>
                <a href="outlet_detail.php?id_outlet=<?= $row['id_outlet']?>" >
                  <h5 style="color:#0a130aa6"> <span> <i class="fa fa-vcard" style="margin-right: 0.4vw; color:blue"> </i></span> <?= ucfirst($row['name_outlet']); ?></h5>
                </a>
                <h5 style="color:#0a130aa6"><span> <i class="fa fa-map-marker" style="margin-right: 0.4vw; color:red"></i></span> <?= $row['city'] ?></h5>

              </div>
            </div>
          </div>

        </div>
      </a>
      <?php $i++; ?>
    <?php endforeach; ?>
  </div>
</section>



<!-- go to top -->
<span class="to_top"><i class="fa fa-arrow-up"></i></span>
<!-- end go to top -->

<!-- FOOTER -->
<script>


</script>
<?php
include "footer.php";
?>