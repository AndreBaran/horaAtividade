<div class="modal fade" id="modalMensagem" name="modalMensagem" tabindex="-1" role="dialog" aria-labelledby="titleModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titleModal">Mensagem</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="message"></div>

                <form id="formEvent">
                    @if((Auth::user()->tipo == '1') or (Auth::user()->tipo == '0'))
                    <div class="form-group row">
                        <label for="title" class="col-sm-4 col-form-label">Professor</label>
                        <div class="col-sm-8">
                            <select class="form-select " style="width:300px;" aria-label="Default select example" id="cmbProfessor_msg" name="cmbProfessor_msg">

                            </select>

                        </div>
                    </div>
                    @endif
                    <div class="form-group row">
                        <label for="title" class="col-sm-4 col-form-label">Atividade</label>
                        <div class="col-sm-8">
                            <select class="form-select " style="width:300px;" aria-label="Default select example" id="cmbAtividade_msg" name="cmbAtividade_msg">

                            </select>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="start" class="col-sm-4 col-form-label">Data/hora Inicial</label>
                        <div class="col-sm-8">
                            <input type="text" name="start_msg" class="form-control date-time" id="start_msg" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="end" class="col-sm-4 col-form-label">Data/hora Final</label>
                        <div class="col-sm-8">
                            <input type="text" name="end_msg" class="form-control date-time" id="end_msg">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Mensagem</label>
                        <textarea class="form-control" id="mensagem_text_msg" name="mensagem_text_msg" rows="3" @if(Auth::user()->tipo <> '2') disabled @endif></textarea>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Situação</label>
                        <select name="status_msg" id="status_msg" class="browser-default" disabled>
                            <option value=0>Não Avaliado</option>
                            <option value=1>Aprovada</option>
                            <option value=2>Rejeitada</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-danger deleteEvent_msg">Excluir</button>
                @if(Auth::user()->tipo == '2')
                <button type="button" class="btn btn-primary saveEvent_msg">Salvar</button>
                @endif
                @if((Auth::user()->tipo == '1') or (Auth::user()->tipo == '0'))
                <button type="button" class="btn btn-danger refuseEvent_msg">Recusar</button>
                <button type="button" class="btn btn-success acceptEvent_msg">Aprovar</button>
                @endif
            </div>
            <div type="hidden" class="form-group row">
                <div class="col-sm-8">
                    <input type="hidden" type="text" name="title_msg" class="form-control" id="title_msg">
                    <input type="hidden" name="id_msg">
                </div>
            </div>
        </div>
    </div>
</div>