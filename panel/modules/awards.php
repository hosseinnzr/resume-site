<?php
require('../controler/conection.php');

$select = mysqli_query($con, "SELECT * FROM `awards` order by `id` DESC");
?>
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Show All Awards</h1>

    <div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th width="45%">Title</th>
                        <th width="20%">link</th>
                        <th width="15%">type</th>
                        <th width="15%">action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php while ($row = mysqli_fetch_array($select)): ?>
                    <tr id="<?=$row['id'];?>">
                        <td><?=$row['id'];?></td>
                        <td><?=$row['title'];?></td>
                        <td><?=$row['link'];?></td>
                        <td><?=$row['type'];?></td>
                        <td>
                            <span onclick="removeRecordFromTable('<?=$row['id'];?>', '<?=$row['id'];?>', 'awards');" 
                            class="fa fa-trash" style="color: #e74a3b ; cursor: pointer; margin: 6px;"></span>

                            <a href="<?=$GLOBALS['PANEL_ROUT_MAIN_ADR'];?>add_awards&id=<?=$row['id']?>">
                                <span class="fa fa-edit" style="color: #5a5c69 ; cursor: pointer; margin: 6px;"></span>
                            </a>

                        </td>
                    </tr>
                    <?php endwhile;?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>  


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    function removeRecordFromTable(rowId, elemtId, Mod = 'awards') {
        $('#'+elemtId).css('background','red');
        var confirmation = confirm("Are you sure you want to delete this record?");
        if(confirmation){
            $.post('controllers/ajax.php', {action: 'remove_from_table', recordId: elemtId , mod: Mod}, function (data) {
            data = data.trim();
            data = JSON.parse(data);
            if(data.result){
                $('#'+elemtId).remove();
            }else{
                $('#'+elemtId).css('background','#fff');
            }
            });
        }else{
                $('#'+elemtId).css('background','#fff');
            }        
    }
</script>
    