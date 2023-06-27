const url = "../controllers/mainController.php";

const registrar = async () => {
  const { ok, mensaje } = await fetch(`${url}?operacion=registrar`, {
    method: "POST",
    body: new FormData($("#form-register")[0]),
  }).then((res) => res.json());

  if (ok) {
    $('#form-register').trigger("reset");
    return toastr.success(mensaje);
    
  } else {
    return toastr.error(mensaje);
  }
};

$("#btn-register").click(async (e) => {
  e.preventDefault();
  await registrar();
});
