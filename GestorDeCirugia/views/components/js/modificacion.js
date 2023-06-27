const url = "../controllers/mainController.php";
const modificar = async () => {
    const { ok, mensaje } = await fetch(`${url}?operacion=modificar`,{
      method: "POST",
      body: new FormData($("#form-mod")[0]),
    }).then((res) => res.json());
  
    if (ok) {
      $('#form-mod');
      return toastr.success(mensaje);
    } else {
      return toastr.error(mensaje);
    }
  };
  
  $("#btn-mod").click(async (e) => {
    e.preventDefault();
    await modificar();
  });
  