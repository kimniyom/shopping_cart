<style type="text/css">
    .admin-menu > .btn{
        margin: 0px; border-radius: 0px;
    }
    .admin-menu > .btn:hover{
        background: #cc0000;
    }
</style>
<div class="row admin-menu" style="margin:0px;">
    <?php for ($i = 1; $i <= 6; $i++): ?>
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 btn btn-info">
            <i class="fa fa-cogs fa-5x"></i><br/><br/>
            <font style="font-size: 24px;">ทดสอบจัดการเมนู</font>
        </div>
    <?php endfor; ?>
</div>

