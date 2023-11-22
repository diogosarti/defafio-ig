function validaCPF(cpf) {
    if (cpf.length !== 11) {
        return false;
    }

    let numeros = cpf.substring(0, 9);
    let digitos = cpf.substring(9);
    let soma = 0;
    for (let i = 10; i > 1; i--) {
        soma += numeros.charAt(10 - i) * i;
    }
    let resultado = (soma % 11) < 2 ? 0 : 11 - (soma % 11);

    if (resultado != digitos.charAt(0)) {
        return false;
    }
    soma = 0;
    numeros = cpf.substring(0, 10);
    for (let k = 11; k > 1; k--) {
        soma += numeros.charAt(11 - k) * k;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - (soma % 11);
    if (resultado != digitos.charAt(1)) {
        return false;
    }
    return true;
}

$(document).ready(function() {
    $('#cpf').on('input', function() {
        let input=$(this);
        let cpf = input.val();
        let is_cpf = cpf.length === 11 && validaCPF(cpf);
        if(is_cpf){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
        $('#cpfError').text(is_cpf ? "" : "CPF inválido.");
    });

    $('#creci').on('input', function() {
        let input=$(this);
        let is_length=input.val().length >= 2;
        if(is_length){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
        $('#creciError').text(is_length ? "" : "Creci deve ter pelo menos 2 caracteres.");
    });

    $('#nome').on('input', function() {
        var input=$(this);
        var nome = input.val();
        var is_nome = /^[a-zA-Z\s]*$/.test(nome) && nome.length >= 2;
        if(is_nome){input.removeClass("invalid").addClass("valid");}
        else{input.removeClass("valid").addClass("invalid");}
        $('#nomeError').text(is_nome ? "" : "O nome não deve conter números e deve ter pelo menos 2 caracteres.");
    });

  $('#formularioCadastro').on('submit', function(e) {
      if ($('.invalid').length) {
          e.preventDefault();
      }
  });
});

