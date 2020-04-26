<?php
    include('../app/config.php');
    $query=mysqli_query($koneksi,"SELECT * FROM siswa ORDER BY nama ASC");
	include('../templates/header.php');
	include('../templates/menu.php');
?>

<div class="container-fluid">
	<h3 class="text-center mb-5">DATA SISWA</br>SMK NEGERI 2 KUNINGAN</h3>
        <div class="row">
            <div class="col">
                <a href="import.php"  class="btn btn-primary btn-sm mb-2 float-left">Import Data</a>
                <button type="button" class="btn btn-primary btn-sm mb-2 float-right" data-toggle="modal" data-target="#exportModal">Export PDF</button>
                <button type="button" class="btn btn-primary btn-sm mb-2 mr-1 float-right" data-toggle="modal" data-target="#exportExcel">Export Excel</button>
                <a href="hapusAll.php" onclick="return confirm('Hapus semua data?')" class="btn btn-danger btn-sm mr-1 mb-2 float-right">Hapus Semua</a>
            </div>
        </div>
            <table id="tabel_export" class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th class='text-center' scope="col" width=1% width=1%>No.</th>
                        <th class='text-center' scope="col">NIS</th>
                        <th class='text-center' scope="col">Nama Siswa</th>
                        <th class='text-center' scope="col" width=15%>Jenis Kelamin</th>
                        <th class='text-center' scope="col" width=15%>Kelas</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i=1;
                        foreach ($query as $data) {
                            echo'<tr>
                                    <td class="text-center">'.$i++.'</td>
                                    <td class="text-center">'.$data['nis'].'</td>
                                    <td class="text-center">'.$data['nama'].'</td>
                                    <td class="text-center">'.$data['jk'].'</td>
                                    <td class="text-center">'.$data['kelas'].'</td>
                                </tr>'
                            ;
                        }
                    ?>
                   
                </tbody>
            </table>
        </div>
<?php
	include('../templates/footer.php');
?>
<!-- Modal -->
<div class="modal fade" id="exportModal" tabindex="-1" role="dialog" aria-labelledby="exportModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="eportModalLabel">EXPORT DATA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" target="blank" action="print.php">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Kelas</label>
                <select class="form-control"name="kelas">
                    <?=kelas;?>
                </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" target="blank">Export</button>
          </div>
      </form>
    </div>
  </div>
</div>


<div class="modal fade" id="exportExcel" tabindex="-1" role="dialog" aria-labelledby="exportExcelLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="eportExcelLabel">EXPORT DATA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" target="blank" action="exportexcel.php">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Kelas</label>
                <select class="form-control"name="kelas">
                    <?=kelas;?>
                </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" target="blank">Export</button>
          </div>
      </form>
    </div>
  </div>
</div>