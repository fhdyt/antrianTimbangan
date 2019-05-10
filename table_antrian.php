<style>
.table-condensed{
font-size: 12px;
}
</style>
<table class="table table-condensed">
  <thead>
    <tr>
      <th>No.</th>
      <th>No. Antrian</th>
      <th>Nama</th>
      <th>Jenis Ponton</th>
      <th>Tanggal</th>
      <th>Tonase</th>
      <th>Hoper Timbangan</th>
    </tr>
  </thead>
  <tbody id="zona_data">

  </tbody>
</table>

<script>
  function antrian_list()
{
    $.ajax({
      type : 'POST',
      url:'modules/antrian_list.php',
      success:function(response)
      {
         if(response == "no_data"){
           $("tbody#zona_data").empty();
          $("tbody#zona_data").append("<tr><td colspan='7'><div class='callout callout-danger'>Belum ada data.</div></td></tr>");
         }
         else{
          $("tbody#zona_data").empty();
          $("tbody#zona_data").append(""+response+"");
        }
      },
      error:function()
      {
        alert("Sistem Bermasalah");
      }
    });
  }
  $(function(){ antrian_list(); });

  function selesai_timbang(id){
    var data = "ID="+id+"";
    $.ajax({
      type : 'POST',
      url:'modules/selesai_timbang.php',
      data : data,
      success:function(response)
      {
         if(response == "no_data"){
           alert("Gagal");
         }
         else{
           antrian_list();
           no_antrian();
           hoper_1();
           hoper_2();
        }
      },
      error:function()
      {
        alert("Sistem Bermasalah");
      }
    });
  }
</script>
