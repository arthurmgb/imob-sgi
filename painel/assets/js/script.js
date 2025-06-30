function buscar_cep() {
  var cep = $("input[name=cep]").val();
  cep = cep.replace("-", "");

  if (cep.length == 8) {
    $.ajax({
      url: "https://viacep.com.br/ws/" + cep + "/json/",
      type: "GET",
      dataType: "json",
      success: function (json) {
        $("input[name=endereco]").val(json.logradouro);
        $("input[name=bairro]").val(json.bairro);
        $("input[name=cidade]").val(json.localidade);
        $("input[name=uf]").val(json.uf);
      },
    });
  }
}

function apagar_foto(obj) {
  var foto = $(obj).attr("data-foto");
  $.ajax({
    url: BASE_URL + "imovel/apagar_foto",
    type: "POST",
    data: { foto: foto },
    success: function (data) {
      if (!data.proccess == true) {
        alert("Algo deu errado! Tente novamente.");
      } else {
        window.location.href =
          window.location.href +
          "?type=success&msg=Imóvel+atualizado+com+sucesso%21";
      }
    },
  });
}

function buscar_proprietario() {
  var valor = $("input[name=q]").val();

  // if(valor.length >= 6) {
  $.ajax({
    url: BASE_URL + "proprietarios/getlista/",
    type: "post",
    dataType: "json",
    data: { valor: valor },
    success: function (json) {
      var html = "";
      for (var i in json) {
        html +=
          '<tr class="' +
          (json[i].status == 2 ? "danger" : "") +
          '"><td>' +
          json[i].referencia +
          "</td>";
        html += "<td>" + json[i].nome + "</td>";
        html += '<td style="word-break: break-all;">' + json[i].cpf + "</td>";
        html += "<td>" + json[i].endereco + "</td>";
        html += "<td>" + json[i].bairro + "</td>";
        html += "<td>" + json[i].cidade + "</td>";
        html += "<td>" + json[i].telefone + "</td>";
        html += "<td>" + json[i].qtd_imoveis + "</td>";
        html +=
          '<td><a href="' +
          BASE_URL +
          "proprietarios/ver/" +
          json[i].id +
          '" title="Ver">';
        html += '<i class="fa fa-eye fa-1x fa-border"></i></a>';
        html +=
          '<a href="' +
          BASE_URL +
          "proprietarios/editar/" +
          json[i].id +
          '" title="Editar" style="margin:0 10px;">';
        html += '<i class="fa fa-file-text fa-1x fa-border"></i></a>';
        html +=
          '<a href="' +
          BASE_URL +
          "proprietarios/del/" +
          json[i].id +
          '" title="Excluir">';
        html += '<i class="fa fa-trash fa-1x fa-border"></i></a></td></tr>';
      }

      var botaovoltar =
        '<a style="float: right; margin-right: 10px; margin-top: 10px" href="' +
        BASE_URL +
        'proprietarios/listar"class="btn btn-default btn-sm">Ver todos</a>';
      $(".dataTables_paginate").html(botaovoltar);
      $("#example2 tbody").html(html);
    },
  });
  // } else if (valor.length == 0) {
  // window.location.href=window.location.href;
  // }
  if (valor.length == 0) {
    window.location.href = window.location.href;
  }
}

function buscar_fiador() {
  var valor = $("input[name=q]").val();

  // if(valor.length >= 5) {
  $.ajax({
    url: BASE_URL + "fiadores/getlista/",
    type: "post",
    dataType: "json",
    data: { valor: valor },
    success: function (json) {
      var html = "";
      for (var i in json) {
        html += '<tr class="' + (json[i].status == 2 ? "danger" : "") + '">';
        html += "<td>" + json[i].nome + "</td>";
        html += "<td>" + json[i].n_inquilino + "</td>";
        html += "<td>" + json[i].cpf + "</td>";
        html += "<td>" + json[i].endereco + "</td>";
        html += "<td>" + json[i].bairro + "</td>";
        html += "<td>" + json[i].cidade + "</td>";
        html += "<td>" + json[i].telefone + "</td>";
        html +=
          '<td><a href="' +
          BASE_URL +
          "fiadores/ver/" +
          json[i].id +
          '" title="Ver">';
        html += '<i class="fa fa-eye fa-1x fa-border"></i></a>';
        html +=
          '<a href="' +
          BASE_URL +
          "fiadores/editar/" +
          json[i].id +
          '" title="Editar" style="margin:0 10px;">';
        html += '<i class="fa fa-file-text fa-1x fa-border"></i></a>';
        html +=
          '<a href="' +
          BASE_URL +
          "fiadores/del/" +
          json[i].id +
          '" title="Excluir">';
        html += '<i class="fa fa-trash fa-1x fa-border"></i></a></td></tr>';
      }

      var botaovoltar =
        '<a style="float: right; margin-right: 10px; margin-top: 10px" href="' +
        BASE_URL +
        'fiadores/listar"class="btn btn-default btn-sm">Ver todos</a>';
      $(".dataTables_paginate").html(botaovoltar);
      $("#example2 tbody").html(html);
    },
  });
  // } else if (valor.length == 0) {
  // window.location.href=window.location.href;
  // }
  if (valor.length == 0) {
    window.location.href = window.location.href;
  }
}

function buscar_contratos() {
  var valor = $("input[name=q]").val();

  // if(valor.length >= 6) {
  $.ajax({
    url: BASE_URL + "contratos/getlista/",
    type: "post",
    dataType: "json",
    data: { valor: valor },
    success: function (json) {
      console.log(json);
      var html = "";

      for (var i in json) {
        html +=
          '<tr class="' +
          (json[i].status == 2 ? "danger" : "") +
          '"><td>' +
          json[i].id +
          "</td>";
        html += "<td>" + json[i].nome + "</td>";
        html += "<td>" + json[i].nome_proprietario + "</td>";
        html += "<td>" + json[i].end_imv + " - " + json[i].bairro_imv + "</td>";
        html +=
          "<td>" + json[i].data_inicio.split("-").reverse().join("/") + "</td>";
        html +=
          "<td>" + json[i].data_final.split("-").reverse().join("/") + "</td>";
        html +=
          '<td><a style="margin: 0px 10px;" href="' +
          BASE_URL +
          "financeiro?contrato=" +
          json[i].id +
          '" title="Pagamentos">';
        html += '<i class="fa fa-money fa-1x fa-border text-success"></i></a>';

        if (json[i].del_approval == "0") {
          html +=
            '<a href="' +
            BASE_URL +
            "contratos/del/" +
            json[i].id +
            '" title="Excluir">';
          html += '<i class="fa fa-trash fa-1x fa-border text-danger"></i></a>';
        }

        html += "</td></tr>";
      }

      if (json == "") {
        html +=
          '<tr><td class="bg-danger" colspan="7" style="text-align: center; padding: 30px 0;">Nenhum contrato encontrado para essa busca.</td></tr>';
      }

      var botaovoltar =
        '<a style="float: right; margin-right: 10px; margin-top: 10px" href="' +
        BASE_URL +
        'contratos/buscar" class="btn btn-primary btn-sm">Visualizar todos</a>';
      $(".dataTables_paginate").html(botaovoltar);
      $("#example2 tbody").html(html);
    },
  });
  // } else if (valor.length == 0) {
  // window.location.href=window.location.href;
  // }
  if (valor.length == 0) {
    window.location.href = window.location.href;
  }
}

function buscar_imoveis() {
  var valor = $("input[name=q]").val();

  // if(valor.length >= 6) {
  $.ajax({
    url: BASE_URL + "imovel/getlista/",
    type: "post",
    dataType: "json",
    data: { valor: valor },
    success: function (json) {
      var html = "";

      for (var i in json) {
        let style_cemig = "";

        if (!json[i].cemig) {
          json[i].cemig = "Não cadastrado";
          style_cemig = 'style="color:red;"';
        } else {
          style_cemig = 'style="color: green; font-weight: bold;"';
        }

        if (json[i].status == 1) {
          json[i].status = "Alugado";
        } else if (json[i].status == 2) {
          json[i].status = "Disponível";
        }

        html +=
          '<tr class="' +
          (json[i].status == "Disponível" ? "success" : "") +
          '"><td>' +
          json[i].referencia +
          "</td>";
        html += "<td>" + json[i].tipo + "</td>";
        html += "<td>" + json[i].endereco + "</td>";
        html += "<td>" + json[i].nome_prop + "</td>";
        html += `<td ${style_cemig}>` + json[i].cemig + `</td>`;
        html += "<td>" + json[i].bairro + "</td>";
        html += "<td> R$ " + json[i].valor + "</td>";
        html += "<td>" + json[i].status + "</td>";
        html +=
          '<td><a href="' +
          BASE_URL +
          "imovel/ver/" +
          json[i].id +
          '" title="Ver">';
        html += '<i class="fa fa-eye fa-1x fa-border"></i></a>';
        html +=
          '<a href="' +
          BASE_URL +
          "imovel/editar/" +
          json[i].id +
          '" title="Editar" style="margin:0 10px;">';
        html += '<i class="fa fa-file-text fa-1x fa-border"></i></a>';
        html +=
          '<a href="' +
          BASE_URL +
          "imovel/del/" +
          json[i].id +
          '" title="Excluir">';
        html += '<i class="fa fa-trash fa-1x fa-border"></i></a></td></tr>';
      }

      var botaovoltar =
        '<a style="float: right; margin-right: 10px; margin-top: 10px" href="' +
        BASE_URL +
        'imovel/listar"class="btn btn-default btn-sm">Ver todos</a>';
      $(".dataTables_paginate").html(botaovoltar);
      $("#example2 tbody").html(html);
    },
  });
  // } else if (valor.length == 0) {
  // window.location.href=window.location.href;
  // }

  if (valor.length == 0) {
    window.location.href = window.location.href;
  }
}

function buscar_inquilinos() {
  var valor = $("input[name=q]").val();

  // if(valor.length >= 5) {
  $.ajax({
    url: BASE_URL + "inquilinos/getlista/",
    type: "post",
    dataType: "json",
    data: { valor: valor },
    success: function (json) {
      var html = "";
      for (var i in json) {
        var endereco = "";
        if (json[i].endereco != null) {
          endereco = json[i].endereco + " - " + json[i].bairro;
        }

        html += '<tr class="' + (json[i].status == 2 ? "danger" : "") + '">';
        html += "<td>" + json[i].referencia + "</td>";
        html += "<td>" + json[i].nome + "</td>";
        html += "<td>" + json[i].cpf + "</td>";
        html += "<td>" + json[i].telefone + "</td>";
        html += "<td>" + endereco + "</td>";
        html +=
          '<td><a href="' +
          BASE_URL +
          "inquilinos/ver/" +
          json[i].id +
          '" title="Ver">';
        html += '<i class="fa fa-eye fa-1x fa-border"></i></a>';
        html +=
          '<a href="' +
          BASE_URL +
          "inquilinos/editar/" +
          json[i].id +
          '" title="Editar" style="margin:0 10px;">';
        html += '<i class="fa fa-file-text fa-1x fa-border"></i></a>';
        html +=
          '<a href="' +
          BASE_URL +
          "inquilinos/del/" +
          json[i].id +
          '" title="Excluir">';
        html += '<i class="fa fa-trash fa-1x fa-border"></i></a></td></tr>';
      }

      var botaovoltar =
        '<a style="float: right; margin-right: 10px; margin-top: 10px" href="' +
        BASE_URL +
        'inquilinos/listar"class="btn btn-default btn-sm">Ver todos</a>';
      $(".dataTables_paginate").html(botaovoltar);
      $("#example2 tbody").html(html);
    },
  });
  // } else if (valor.length == 0) {
  // window.location.href=window.location.href;
  // }
  if (valor.length == 0) {
    window.location.href = window.location.href;
  }
}

function pegarFiadoresPorCodInquilino(obj) {
  var valor = $(obj).val();

  if (valor.length >= 5) {
    $.ajax({
      url: BASE_URL + "fiadores/peganomesfiadores/",
      type: "post",
      dataType: "json",
      data: { valor: valor },
      success: function (json) {
        var html = '<option value="0">Nenhum selecionado</option>';

        json.fiadores.map(function (v) {
          html += '<option value="' + v.id + '">' + v.nome + "</option>";
        });

        $("#nInquilino").val(json.inquilino);
        $("#fiador1, #fiador2").html(html);
      },
    });
  } else {
    var html = '<option value="0">Nenhum selecionado</option>';
    $("#nInquilino").val("");
    $("#fiador1, #fiador2").html(html);
  }
}

// Função para carregar os dados da consulta nos respectivos campos
function carregarDados() {
  var busca = $("#busca").val();

  if (busca != "" && busca.length >= 2) {
    $.ajax({
      url: "teste",
      dataType: "json",
      data: {
        acao: "consulta",
        parametro: $("#busca").val(),
      },
      success: function (data) {
        $("#endereco").val(data[0].endereco);
        $("#bairro").val(data[0].bairro);
        $("#cidade").val(data[0].cidade);
        $("#finalidade").val(data[0].finalidade);
        $("#tipo").val(data[0].tipo);
        $("#valor").val(data[0].valor);
        $("#iptu").val(data[0].iptu);
        $("#reajuste").val(data[0].reajuste);
        $("#proprietario").val(data[0].proprietario);
      },
    });
  }
}

$(function () {
  /*var largura = window.innerWidth;

  if(largura <= 1317) {
    $('.sidebar-toggle').click();
  }*/

  $("#select-con-imv").on("change", function () {
    var valor = $(this).val();

    if (valor.length >= 1 && valor !== "") {
      $.ajax({
        url: BASE_URL + "contratos/getinfocontrato",
        type: "post",
        dataType: "json",
        data: { parametro: valor },
        success: function (data) {
          $("#endereco").val(data.endereco);
          $("#bairro").val(data.bairro);
          $("#cidade").val(data.cidade);
          $("#finalidade").val(data.finalidade);
          $("#cep").val(data.cep);
          $("#tipo").val(data.tipo);
          $("#iptu").val(data.iptu);
          // $("#valor").val(data.valor);
          $("#valor").val(
            Number(data.valor).toLocaleString("pt-BR", {
              minimumFractionDigits: 2,
            })
          );
          $("#reajuste").val(data.reajuste);
          $("#proprietario").val(data.proprietario);
          $("#cod_proprietario").val(data.cod_proprietario);
          $("#box-edit-imv").show();
          $("#con-edit-imv").attr(
            "href",
            BASE_URL + "imovel/editar/" + data.id
          );
        },
      });
    } else if (valor == "") {
      $("#endereco").val("");
      $("#bairro").val("");
      $("#cidade").val("");
      $("#tipo").val("");
      $("#finalidade").val("");
      $("#cep").val("");
      $("#valor").val("");
      $("#iptu").val("");
      $("#reajuste").val("");
      $("#proprietario").val("");
      $("#box-edit-imv").hide();
      $("#con-edit-imv").attr("href", "#");
    }
  });

  // Atribui evento e função para limpeza dos campos
  $("#busca").on("keyup", function () {
    var valor = $(this).val();
    if (valor.length >= 5) {
      $.ajax({
        url: BASE_URL + "contratos/getinfocontrato",
        type: "post",
        dataType: "json",
        data: { parametro: valor },
        success: function (data) {
          $("#endereco").val(data.endereco);
          $("#bairro").val(data.bairro);
          $("#cidade").val(data.cidade);
          $("#finalidade").val(data.finalidade);
          $("#cep").val(data.cep);
          $("#tipo").val(data.tipo);
          $("#valor").val(data.valor);
          $("#iptu").val(data.iptu);
          $("#reajuste").val(data.reajuste);
          $("#proprietario").val(data.proprietario);
          $("#cod_proprietario").val(data.cod_proprietario);
        },
      });
    } else if (valor.length == 0) {
      $("#endereco").val("");
      $("#bairro").val("");
      $("#cidade").val("");
      $("#tipo").val("");
      $("#finalidade").val("");
      $("#cep").val("");
      $("#valor").val("");
      $("#iptu").val("");
      $("#reajuste").val("");
      $("#proprietario").val("");
    }
  });

  $("input[name='codigo_proprietario']").on("keyup", function () {
    var valor = $(this).val();
    if (valor.length >= 5) {
      $.ajax({
        url: BASE_URL + "imovel/get_name_proprietario",
        dataType: "json",
        data: {
          codigo: valor,
        },
        success: function (data) {
          $("#nome_proprietario").val(data.name);
        },
      });
    } else if (valor.length == 0) {
      $("#nome_proprietario").val("");
    }
  });

  $("input[name='codigo_inquilino']").on("keyup", function () {
    var valor = $(this).val();
    if (valor.length >= 5) {
      $.ajax({
        url: BASE_URL + "inquilinos/get_name_inquilino",
        type: "POST",
        dataType: "json",
        data: {
          codigo: valor,
        },
        success: function (data) {
          $("#nome_inquilino").val(data.nome);
        },
      });
    } else if (valor.length == 0) {
      $("#nome_inquilino").val("");
    }
  });

  //mascara para campos input
  $("#cep").mask("00000-000");
  $("#tel").mask("(00) 00000-0000");
  $("#cpf").mask("000.000.000-00");
  $("#cnpj").mask("00.000.000/0000-00");
  $(".dinheiro").mask("000.000.000.000.000,00", { reverse: true });
  $(".num-reajuste").mask("00.00", { reverse: true });
  $(".cash").mask("00.000,00", { reverse: true });
  $(".only-num").mask("0000");
  //$('.dinheiro2').mask("#.##0,00" , { reverse:true});

  $(".sidebar-toggle").click(function (event) {
    event.preventDefault();
    $(".user-panel").hide("fast");
  });
  $(".sidebar-toggle").click(function (event) {
    event.preventDefault();
    $(".user-panel").show();
  });
});

$(".btn-edit-parc").on("click", function () {
  const id = $(this).data("id");
  const n = $(this).data("n");

  $.ajax({
    url: BASE_URL + "financeiro/populareditar/",
    method: "post",
    dataType: "json",
    data: {
      id: id,
      n: n,
    },
    success: function (res) {
      if (res.status === "ok") {
        const p = res.data;
        const $modal = $("#editarParcela");

        // Preenche os campos principais
        $modal.find("input[name='id_contrato']").val(p.id_contrato);
        $modal.find("input[name='n_parcela']").val(p.n_parcela);
        $modal.find("input[name='valor']").val(p.valor);
        $modal.find("input[name='data_inicio']").val(p.data_inicio);
        $modal.find("input[name='data_fim']").val(p.data_fim);

        // Preenche data-n e data-id de #btn-est-pag e #btn-est-rep
        $("#btn-est-pag").attr("data-n", p.n_parcela);
        $("#btn-est-pag").attr("data-id", p.id_contrato);

        // Manipula a exibição do campo data_pag
        if (p.status != 0 && p.data_pag) {
          $("#actions_th").show();
          $("#actions_td").show();
          $("#data_pag_th").show();
          $("#data_pag_td").show();
          $("#btn-est-pag").show();
          $modal.find("input[name='data_pag']").val(p.data_pag);
        } else {
          $("#actions_th").hide();
          $("#actions_td").hide();
          $("#data_pag_th").hide();
          $("#data_pag_td").hide();
          $("#btn-est-pag").hide();
          $modal.find("input[name='data_pag']").val("");
        }

        // Manipula a exibição do data_rep
        if (p.repasse != 0 && p.data_repasse) {
          $("#data_rep_th").show();
          $("#data_rep_td").show();
          $("#btn-est-rep-none").hide();
          $modal.find("input[name='data_rep']").val(p.data_repasse);
        } else {
          $("#data_rep_th").hide();
          $("#data_rep_td").hide();
          $("#btn-est-rep-none").show();
          $modal.find("input[name='data_rep']").val("");
        }

        // Abre o modal
        $modal.modal({
          backdrop: "static",
          keyboard: false,
        });
      } else {
        alert("Erro ao buscar dados da parcela.");
      }
    },
    error: function (xhr, status, error) {
      console.log(error);
    },
  });
});
