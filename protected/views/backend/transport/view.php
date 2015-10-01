
    <?php if(empty($transport)){ ?>
        <center>ไม่มีข้อมูลส่วนนี้</center>
    <?php } ?>

    <table class="table">
      <?php $i=1;foreach($transport as $datas):$i++;?>
      <tr>
          <td style="text-align:center;"><?php echo $i; ?></td>
          <td><?php echo $datas['price'] ?></td>
          <td><?php echo $datas['detail'] ?></td>
      </tr>
      <?php endforeach; ?>
    </table>
