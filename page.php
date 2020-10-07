            <div class="page">
              <div class="isi">
                    <?php if($page == 1){ ?>       
                       <a href="#">&lt;</a>
                    <?php } else{ ?>
                          <?php $LinkPrev = ($page > 1)? $page - 1 : 1; 
                              if($kolomKataKunci==""){?>
                               <a href="?page=<?php echo $LinkPrev; ?>">&lt;</a>
                          <?php  } else{ ?> 
                              <a href="?KataKunci=<?php echo $kolomKataKunci;?>&page=<?php echo $LinkPrev;?>">&lt;</a>
                          <?php } ?> 
                    <?php }?>
                      <?php
                        //kondisi jika parameter pencarian kosong
                        if($kolomKataKunci==""){
                          $SqlQuery = mysqli_query($conn,"SELECT * FROM gambar WHERE orang_id='$id'");
                        }else{
                          //kondisi jika parameter kolom pencarian diisi
                           $SqlQuery = mysqli_query($conn,"SELECT * FROM gambar WHERE orang_id = '$id' AND nama_gambar LIKE '%$kolomKataKunci%'");
                        }     
                        //Hitung semua jumlah data 
                        $JumlahData = mysqli_num_rows($SqlQuery);
                        
                        // Hitung jumlah halaman yang tersedia
                        $jumlahPage = ceil($JumlahData / $limit); 
                        
                        // Jumlah link number 
                        $jumlahNumber = 1; 

                        // Untuk awal link number
                        $startNumber = ($page > $jumlahNumber)? $page - $jumlahNumber : 1; 
                        
                        // Untuk akhir link number
                        $endNumber = ($page < ($jumlahPage - $jumlahNumber))? $page + $jumlahNumber : $jumlahPage; 
                        
                        if ($startNumber > 1 ||  $startNumber == 1) {?>
                          <a href="?KataKunci=<?=$kolomKataKunci;?>&page=1">1</a>
                          <span>...</span>
                        <?php }?>

                       <?php for($i = $startNumber; $i <= $endNumber; $i++){ ?>
                         <?php if($kolomKataKunci==""){?>
                            <?php if($i == $page){ ?>
                                <a href="?page=<?php echo $i; ?>" style="color: red;"><?php echo $i; ?></a>
                            <?php }else{ ?>
                                <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                            <?php } ?>
                         <?php } else { ?>
                            <?php if($i == $page){ ?>
                                <a href="?KataKunci=<?php echo $kolomKataKunci;?>&page=<?php echo $i; ?>" style="color: red;"><?php echo $i; ?></a>
                            <?php }else ?>
                                
                            <?php } ?>
                      <?php } ?>

                      <?php if ($endNumber < $jumlahPage || $endNumber > 1) {?>
                          <span>...</span>
                          <a href="?KataKunci=<?=$kolomKataKunci;?>&page=<?=$jumlahPage?>"><?=$jumlahPage?></a>
                        <?php } ?>

                      <?php       
                       if($page == $jumlahPage || $page > $jumlahPage){ 
                      ?>
                       <a href="#">&gt;</a>
                      <?php } else {
                        $linkNext = ($page < $jumlahPage)? $page + 1 : $jumlahPage;

                       if($kolomKataKunci==""){
                          ?>
                            <a href="?page=<?php echo $linkNext; ?>">&gt;</a>
                       <?php     
                          }else{
                        ?> 
                           <a href="?KataKunci=<?php echo $kolomKataKunci;?>&page=<?php echo $linkNext; ?>">&gt;</a>
                      <?php
                        }
                      }
                      ?>
                </div>
            </div>