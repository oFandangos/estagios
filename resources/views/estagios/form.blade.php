@section('javascripts_bottom')
  <script src="{{asset('/js/estagios.js')}}"></script>
@endsection('javascripts_bottom')

@section('styles')
  <link rel="stylesheet" type="text/css" href="{{asset('/css/estagios.css')}}">
@endsection('styles')

<br>
<h4>Estágio</h4>
<br>
O período máximo do estágio inicial deve ser de 12 meses, prorrogável através de termo
aditivo por até 12 meses.
<br><br>

<div class="card">
  <div class="card-header">Informações Gerais</div>
    <div class="card-body">

        <div class="row">
                    <div class="col-sm form-group">
                <div class="form-group">
                    <label for="numero_usp" class="required">Número USP: </label>
                    <input type="number" class="form-control" id="numero_usp" name="numero_usp" value="{{old('numero_usp',$estagio->numero_usp)}}">
                    <div id="info"></div>
                </div>

                </div>
                <div class="col-sm form-group">

                <div class="form-group">
                    <label for="valorbolsa" class="required">Valor da Bolsa (R$): </label>
                    <input type="text" class="form-control" id="valorbolsa" name="valorbolsa" value="{{old('valorbolsa',$estagio->valorbolsa)}}">
                </div>

                </div>
        </div>

        <div class="form-group">
            <label for="horariocompativel" class="required">O horário é compatível com o curso? </label>
            <input type="text" class="form-control" name="horariocompativel" value="{{old('horariocompativel',$estagio->horariocompativel)}}">
        </div>


        <div class="form-group">
            <label for="tipobolsa" class="required">Especifique a natureza do pagamento da bolsa: </label>
            <select name="tipobolsa" class="form-control" id="tipobolsa">
               <option value="" selected="">- Selecione -</option>
                    @foreach ($estagio->tipobolsaOptions() as $option)
                        @if (old('tipobolsa') == '' and isset($estagio->tipobolsa) )
                            <option value="{{$option}}" {{ ( $estagio->tipobolsa == $option) ? 'selected' : ''}}>
                                {{$option}}
                            </option>
                        @else
                            <option value="{{$option}}" {{ ( old('tipobolsa') == $option) ? 'selected' : ''}}>
                                {{$option}}
                            </option>
                        @endif

                    @endforeach

            </select>
        </div>

        <div class="form-group">
        <label for="atividades" class="required">Descrição detalhada das atividades a serem desenvolvidas pelo
        estagiário para que o parecerista analise e constate a relação destas com a formação
        acadêmica do aluno: </label>
            <textarea name="atividades" rows="5" cols="60">{{old('atividades',$estagio->atividades)}}</textarea>
        </div>

        <br>

    </div>
</div>

<hr>

<div class="card">
    <div class="card-header">Período do Estágio</div>
    <div class="card-body">

        <div class="row">
            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="data_inicial" class="required">Data de início do Estágio: </label>
                    <input type="text" class="form-control datepicker" id="data_inicial" name="data_inicial" value="{{old('data_inicial',$estagio->data_inicial)}}" onblur="calculodata(this);">
                </div>
            </div>
            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="data_final" class="required">Data de término do Estágio: </label>
                    <input type="text" class="form-control datepicker" id="data_final" name="data_final" value="{{old('data_final',$estagio->data_final)}}" onblur="calculodata(this);">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="justificativa">Justificativa (Caso o estágio seja inferior a 6 meses): </label>
            <textarea name="justificativa" rows="5" cols="60">{{old('justificativa',$estagio->justificativa)}}</textarea>
        </div>

    </div>
</div>

<hr>


<div class="card">
    <div class="card-header">Carga Horária Semanal (máximo 30 horas)</div>
    <div class="card-body">

        <div class="row">
            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="cargahoras" class="required">Horas: </label>
                    <input type="text" class="form-control" id="cargahoras" name="cargahoras" value="{{old('cargahoras',$estagio->cargahoras)}}">
                </div>
            </div>
            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="cargaminutos" class="required">Minutos: </label>
                    <input type="text" class="form-control" id="cargaminutos" name="cargaminutos" value="{{old('cargaminutos',$estagio->cargaminutos)}}">
                </div>
            </div>

            <div class="form-group">
                <label for="horario" class="required">Horário do Estágio (Caso os horários sejam em períodos diferentes, favor especificar): </label>
                <input type="text" class="form-control horario" id="horario" name="horario" value="{{old('horario',$estagio->horario)}}">
            </div>
        </div>
    </div>
</div>

<hr>

<div class="card">
  <div class="card-header">Auxílio Transporte</div>
    <div class="card-body">

        <div class="row">
            <div class="col-sm form-group">
                <div class="form-group">
                <label for="auxiliotransporte" class="required">Valor do Auxílio transporte (R$): </label>
                    <input type="text" class="form-control" id="auxiliotransporte" name="auxiliotransporte" value="{{old('auxiliotransporte',$estagio->auxiliotransporte)}}">
                </div></div>

            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="especifiquevt" class="required">Especifique o tipo de vale transporte: </label>
                    <select name="especifiquevt" class="form-control" id="especifiquevt">
                        <option value="" selected="">- Selecione -</option>
                            @foreach ($estagio->especifiquevtOptions() as $option)
                            @if (old('especifiquevt') == '' and isset($estagio->especifiquevt) )
                        <option value="{{$option}}" {{ ( $estagio->especifiquevt == $option) ? 'selected' : ''}}>
                            {{$option}}
                        </option>
                        @else
                        <option value="{{$option}}" {{ ( old('especifiquevt') == $option) ? 'selected' : ''}}>
                            {{$option}}
                        </option>
                        @endif
                        @endforeach
                    </select>
                </div></div>
            </div>
</div></div>

<hr>
<div class="card">
  <div class="card-header">Informações sobre a empresa</div>
    <div class="card-body">

        <div class="row">
            <div class="col-sm form-group">
                <div class="form-group">
                <label for="nome_de_contato" class="required">Nome de contato da empresa: </label>
                    <input type="text" class="form-control" id="nome_de_contato" name="nome_de_contato" value="{{old('nome_de_contato',$estagio->nome_de_contato)}}">
                </div></div>
            <div class="col-sm form-group">
                <div class="form-group">
                <label for="email_de_contato" class="required">E-mail de contato da empresa: </label>
                    <input type="email" maxlength="128" class="form-control" id="email_de_contato" name="email_de_contato" value="{{old('email_de_contato',$estagio->email_de_contato)}}">
                </div></div>
            <div class="col-sm form-group">
            <div class="form-group">
                <label for="telefone_de_contato" class="required">Telefone de contato da empresa: </label>
                    <input type="text" maxlength="11" class="form-control" id="telefone-com-ddd" name="telefone_de_contato" value="{{old('telefone_de_contato',$estagio->telefone_de_contato)}}">
                </div></div>
            </div>
            <div class="row">
                <div class="col-sm form-group">
                    <div class="form-group">
                        <label for="endereco_estagio" class="required">Endereço do local do estágio</label>
                        <input type="text" class="form-control" name="endereco_local_estagio" value="{{ old('endereco_local_estagio',$estagio->endereco_local_estagio) }}">
                    </div>
                </div>
            </div>
        <div class="row">
            <div class="col-sm form-group">
                <div class="form-group">
                <label for="nome_do_supervisor_estagio" class="required">Nome do supervisor do estágio: </label>
                    <input type="text" class="form-control" id="nome_do_supervisor_estagio" name="nome_do_supervisor_estagio" value="{{old('nome_do_supervisor_estagio',$estagio->nome_do_supervisor_estagio)}}">
                </div></div>
            <div class="col-sm form-group">
                <div class="form-group">
                <label for="cargo_do_supervisor_estagio" class="required">Cargo do supervisor de estágio: </label>
                    <input type="text" class="form-control" id="cargo_do_supervisor_estagio" name="cargo_do_supervisor_estagio" value="{{old('cargo_do_supervisor_estagio',$estagio->cargo_do_supervisor_estagio)}}">
                </div></div>
            <div class="col-sm form-group">
                <div class="form-group">
                <label for="email_do_supervisor_estagio" class="required">E-mail do supervisor de estágio: </label>
                    <input type="email" maxlength="128" class="form-control" id="email_do_supervisor_estagio" name="email_do_supervisor_estagio" value="{{old('email_do_supervisor_estagio',$estagio->email_do_supervisor_estagio)}}">
                </div></div>
            <div class="col-sm form-group">
            <div class="form-group">
                <label for="telefone_do_supervisor_estagio" class="required">Telefone do supervisor de estágio: </label>
                    <input type="text" maxlength="11" class="form-control" id="telefone-com-ddd" name="telefone_do_supervisor_estagio" value="{{old('telefone_do_supervisor_estagio',$estagio->telefone_do_supervisor_estagio)}}">
                </div></div>
            </div>

            <hr><b>Caso a empresa tenha multiplos representantes legais, rotativos ou esta delegue representantes distintos, favor inserir a informação relativa a este
                estágio abaixo. Caso algum campo ou todos sejam deixados em branco, a respectiva informação usada sobre o representante da empresa será a mesma que
                que se encontra no cadastro da empresa:</b><br><br>
            <div class="row">
                <div class="col-sm form-group">
                    <div class="form-group">
                    <label for="nome_do_representante_opcional">Nome do Representante da Empresa: </label>
                        <input type="text" class="form-control" id="nome_do_representante_opcional" name="nome_do_representante_opcional" value="{{old('nome_do_representante_opcional',$estagio->nome_do_representante_opcional)}}">
                </div></div>
                <div class="col-sm form-group">
                    <div class="form-group">
                    <label for="cargo_do_representante_opcional">Cargo do Representante da Empresa: </label>
                        <input type="text" class="form-control" id="cargo_do_representante_opcional" name="cargo_do_representante_opcional" value="{{old('cargo_do_representante_opcional',$estagio->cargo_do_representante_opcional)}}">
                </div></div>
                <div class="col-sm form-group">
                    <div class="form-group">
                    <label for="email_do_representante_opcional">Email do Representante da Empresa: </label>
                        <input type="text" class="form-control" id="email_do_representante_opcional" name="email_do_representante_opcional" value="{{old('email_do_representante_opcional',$estagio->email_do_representante_opcional)}}">
                </div></div>
            </div>
    </div>
</div>

<hr>

<div class="card">
  <div class="card-header">Informações sobre seguro</div>
    <div class="card-body">

        <div class="row">
            <div class="col-sm form-group">
                <div class="form-group">
                <label for="seguradora" class="required">Nome da seguradora: </label>
                    <input type="text" class="form-control" id="seguradora" name="seguradora" value="{{old('seguradora',$estagio->seguradora)}}">
                </div></div>
            <div class="col-sm form-group">
                <div class="form-group">
                <label for="numseguro" class="required">Número da apólice de seguro: </label>
                    <input type="text" class="form-control" id="numseguro" name="numseguro" value="{{old('numseguro',$estagio->numseguro)}}">
                </div></div>
            </div>
    </div>
</div>
<hr>

<div class="card">
    <div class="card-header">Os campos abaixo só devem ser preenchidos em caso de estágio domiciliar</div>
        <div class="card-body">

<br>

<div class="form-group">
<label for="controlehorario">Como se dará o controle diário dos horários de início e encerramento das atividades?: <br></label>
    <textarea name="controlehorario" rows="5" cols="60">{{old('controlehorario',$estagio->controlehorario)}}</textarea>
</div>

<div class="form-group">
<label for="supervisao">Como se dará a supervisão interna (por parte da empresa)?: <br></label>
    <textarea name="supervisao" rows="5" cols="60">{{old('supervisao',$estagio->supervisao)}}</textarea>
</div>

<div class="form-group">
<label for="interacao">Como se dará a interação do estagiário com o ambiente e com os demais colaboradores da
empresa? Haverá deslocamento para a empresa? Se sim, quais dias?: <br></label>
    <textarea name="interacao" rows="5" cols="60">{{old('interacao',$estagio->interacao)}}</textarea>
</div>

<div class="form-group">
<label for="enderecoedias">Qual o endereço do local e quais serão os dias de realização do estágio?: <br></label>
    <textarea name="enderecoedias" rows="5" cols="60">{{old('enderecoedias',$estagio->enderecoedias)}}</textarea>

        </div>
    </div>
</div>
<br />
