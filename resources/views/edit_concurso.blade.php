<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Editar Concurso</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form id="formEditarConcurso" method="POST" action="{{ route('concursos.update', $concurso->id) }}">
        @csrf
        @method('PUT')
        <div class="modal-body">
            <!-- Campos de edição do concurso -->
            <div class="mb-3">
                <label for="competenciaRequerida" class="form-label">Competência Requerida</label>
                <select class="form-select" id="competenciaRequerida" name="competencia_requerida">
                    @foreach ($competencias as $competencia)
                        <option value="{{ $competencia->id }}" {{ $competencia->id == $concurso->competencia_requerida ? 'selected' : '' }}>
                            {{ $competencia->descricao }}
                        </option>
                    @endforeach
                </select>
            </div>
            <!-- Outros campos de edição conforme necessário -->
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </div>
    </form>
</div>