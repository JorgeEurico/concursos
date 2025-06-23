(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();
    
    
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Sidebar Toggler
    $('.sidebar-toggler').click(function () {
        $('.sidebar, .content').toggleClass("open");
        return false;
    });


    // Progress Bar
    $('.pg-bar').waypoint(function () {
        $('.progress .progress-bar').each(function () {
            $(this).css("width", $(this).attr("aria-valuenow") + '%');
        });
    }, {offset: '80%'});

})(jQuery);

$('#modalCriarConcurso').on('shown.bs.modal', function () {
    $('#nome').focus(); // Foca no campo de nome quando a modal é aberta
});

// Função para limpar os campos do formulário quando a modal é fechada
$('#modalCriarConcurso').on('hidden.bs.modal', function () {
    $('#nome').val('');
    $('#descricao').val('');
    $('#competencia_requerida').val('');
});

$(document).ready(function() {
    $('#criarConcursoForm').on('submit', function(e) {
        e.preventDefault();

        let formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: '{{ route("concursos.criarConcurso") }}',
            data: formData,
            success: function(response) {
                if (response.message) {
                    alert(response.message); // Mensagem de sucesso
                    window.location.href = '{{ route("admin.home") }}'; // Redireciona para admin-home
                }
            },
            error: function(response) {
                alert('Erro ao criar o concurso. Por favor, tente novamente.');
            }
        });
    });

    // Carregar detalhes do concurso na modal
    $('#verDetalhesModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var concursoId = button.data('id');

        $.ajax({
            url: '{{ url("concursos") }}/' + concursoId,
            method: 'GET',
            success: function(data) {
                $('#detalhesConcursoContent').html(`
                    <p><strong>Nome:</strong> ${data.nome}</p>
                    <p><strong>Descrição:</strong> ${data.descricao}</p>
                    <p><strong>Competências:</strong> ${data.competencias.map(comp => comp.descricao).join(', ')}</p>
                `);
            },
            error: function() {
                $('#detalhesConcursoContent').html('<p>Erro ao carregar detalhes do concurso.</p>');
            }
        });
    });
});

document.addEventListener("DOMContentLoaded", function() {
        var successMessage = document.getElementById('successMessage');
        if (successMessage) {
            $('#successModal').modal('show');
        }
    });


    //success delete
    document.addEventListener('DOMContentLoaded', function () {
        const modalSucesso = new bootstrap.Modal(document.getElementById('modalSucesso'));

        const deleteButtons = document.querySelectorAll('.btn-apagar-concurso');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function (event) {
                event.preventDefault();
                const form = this.closest('form');

                if (confirm('Tem certeza de que deseja apagar este concurso?')) {
                    fetch(form.action, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(response => {
                        if (response.ok) {
                            return response.json();
                        }
                        throw new Error('Erro ao deletar o concurso.');
                    })
                    .then(data => {
                        document.getElementById('modalSucessoMessage').textContent = data.message;
                        modalSucesso.show();

                        // Remover a linha da tabela
                        const tableRow = form.closest('tr');
                        tableRow.remove();
                    })
                    .catch(error => {
                        console.error(error);
                        alert('Erro ao deletar o concurso. Por favor, tente novamente.');
                    });
                }
            });
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        const modalEdicao = new bootstrap.Modal(document.getElementById('modalEdicaoConcurso'));

        // Capturar evento de clique no botão Editar
        const editarButton = document.querySelector('.btn-editar-concurso');

        editarButton.addEventListener('click', function (event) {
            event.preventDefault();

            // Preencher os campos da modal com dados atuais do concurso
            const competenciaRequerida = document.getElementById('competenciaRequerida');
            competenciaRequerida.value = '{{ $concurso->competencia_requerida }}'; // Substituir pelo valor atual do concurso

            // Mostrar a modal de edição
            modalEdicao.show();
        });

        // Submeter o formulário de edição via AJAX
        const formEditarConcurso = document.getElementById('formEditarConcurso');

        formEditarConcurso.addEventListener('submit', function (event) {
            event.preventDefault();

            fetch(formEditarConcurso.action, {
                method: 'PUT',
                body: new FormData(formEditarConcurso),
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => {
                if (response.ok) {
                    return response.json();
                }
                throw new Error('Erro ao salvar as mudanças.');
            })
            .then(data => {
                // Atualizar a página ou manipular a resposta conforme necessário
                console.log(data); // Exemplo: exibir mensagem de sucesso

                // Fechar a modal de edição
                modalEdicao.hide();
                // Recarregar a página para refletir as mudanças (ou usar manipulação DOM para atualização dinâmica)
                window.location.reload();
            })
            .catch(error => {
                console.error(error);
                alert('Erro ao salvar as mudanças. Por favor, tente novamente.');
            });
        });
    });

    $('.btn-editar-concurso').click(function() {
        let id = $(this).data('concurso-id');
        $('#modalEditarConcurso').modal('show');
    });

    var editModal = document.getElementById('editModal');
    editModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var id = button.getAttribute('data-id');
        var nome = button.getAttribute('data-nome');
        var patrimonio = button.getAttribute('data-patrimonio');
        var email = button.getAttribute('data-email');
        var competencias = JSON.parse(button.getAttribute('data-competencias'));

        var modalTitle = editModal.querySelector('.modal-title');
        var form = editModal.querySelector('form');
        var nomeInput = editModal.querySelector('#nome');
        var patrimonioSelect = editModal.querySelector('#patrimonio');
        var emailInput = editModal.querySelector('#email');
        var competenciasSelect = editModal.querySelector('#competencias');

        modalTitle.textContent = 'Editar Membro do Júri: ' + nome;
        form.action = '/membros-juris/' + id + '/update';
        nomeInput.value = nome;
        emailInput.value = email;
        patrimonioSelect.value = patrimonio;

        // Limpar seleção de competências
        for (var i = 0; i < competenciasSelect.options.length; i++) {
            competenciasSelect.options[i].selected = false;
        }

        // Selecionar competências do membro do júri
        competencias.forEach(function (competenciaId) {
            for (var i = 0; i < competenciasSelect.options.length; i++) {
                if (competenciasSelect.options[i].value == competenciaId) {
                    competenciasSelect.options[i].selected = true;
                }
            }
        });
    });
    document.addEventListener('DOMContentLoaded', function () {
        // Obter a tabela e o campo de pesquisa
        const table = document.getElementById('membrosTable');
        const searchInput = document.getElementById('searchInput');

        // Adicionar evento de input para o campo de pesquisa
        searchInput.addEventListener('input', function () {
            const term = searchInput.value.toLowerCase();
            const rows = table.getElementsByTagName('tr');

            // Iterar sobre as linhas da tabela
            Array.from(rows).forEach(function (row) {
                const cells = row.getElementsByTagName('td');
                let found = false;

                // Iterar sobre as células da linha
                Array.from(cells).forEach(function (cell) {
                    const text = cell.textContent.toLowerCase();
                    if (text.includes(term)) {
                        found = true;
                    }
                });

                // Mostrar ou esconder a linha com base no termo de pesquisa
                if (found) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });

    document.getElementById('notifyForm').addEventListener('submit', function (event) {
        event.preventDefault(); // Evita o envio padrão do formulário
    
        const form = event.target;
        const formData = new FormData(form);
    
        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.message) {
                if (data.message.includes('Erro')) {
                    document.getElementById('errorMessage').innerText = data.message;
                    new bootstrap.Modal(document.getElementById('errorModal')).show();
                } else {
                    document.getElementById('successMessage').innerText = data.message;
                    new bootstrap.Modal(document.getElementById('successModal')).show();
                }
            }
        })
        .catch(error => {
            document.getElementById('errorMessage').innerText = 'Erro ao enviar a solicitação.';
            new bootstrap.Modal(document.getElementById('errorModal')).show();
        });
    });