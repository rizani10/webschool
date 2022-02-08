$(document).ready(function () {
  $('#dataTables-example').DataTable({
    responsive: true,
    pageLength: 5,
    "lengthMenu": [[5, 20, 50, -1], [5, 20, 50, "All"]],
    "language": {
      url: "https://cdn.datatables.net/plug-ins/1.10.9/i18n/Indonesian.json"
    }
  });
});

$(function () {
  $("#tanggal").datepicker({
    format: 'yyyy-mm-dd'
  });
});


$(document).ready(function () {
  $("#id_mapel").select2();
});

{/* <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
$(document).ready(function () {
  $('ul li a').click(function () {
    $('li a').removeClass("active");
    $(this).addClass("active");
  });
}); */}