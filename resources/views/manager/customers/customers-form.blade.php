<div class="form-group">
	<label for="">Nome</label>
	<input type="text" class="form-control" id="name" name="name" placeholder="(Obrigatório)" @isset($customer) value="{{$customer->Name}}"
	 @endisset required>
</div>

<div class="form-group">
	<label for="">Email</label>
	<input type="text" class="form-control" id="email" name="email" placeholder="(Obrigatório)" @isset($customer) value="{{$customer->Email}}" disabled
	 @endisset required>
</div>

<div class="form-group">
	<label for="">CPF</label>
	<input type="text" class="form-control" id="cpf" name="cpf" placeholder="(Obrigatório)" @isset($customer) value="{{$customer->Cpf}}"  disabled
	 @endisset required>
</div>

<div class="form-group">
	<label for="">Data de Nascimento</label>
	<input type="date" class="form-control" id="birthday" name="birthday" placeholder="(Obrigatório)" @isset($customer) value="{{$customer->Birthday}}"
	 @endisset required>
</div>

<div class="form-group">
	<label for="">Logradouro</label>
	<input type="text" class="form-control" id="publicplace" name="publicplace" placeholder="(Obrigatório)" @isset($customer)
	 value="{{$customer->PublicPlace}}" @endisset required>
</div>

<div class="form-group">
	<label for="">Número</label>
	<input type="text" class="form-control" id="number" name="number" placeholder="(Obrigatório)" @isset($customer) value="{{$customer->Number}}"
	 @endisset required>
</div>

<div class="form-group">
	<label for="">Complemento</label>
	<input type="text" class="form-control" id="complement" name="complement" placeholder="(Opcional)" @isset($customer) value="{{$customer->Complement}}"
	 @endisset>
</div>

<div class="form-group">
	<label for="">CEP</label>
	<input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="(Obrigatório)" @isset($customer) value="{{$customer->ZipCode}}"
	 @endisset required>
</div>

<div class="form-group">
	<label for="">Bairro</label>
	<input type="text" class="form-control" id="neighborhood" name="neighborhood" placeholder="(Obrigatório)" @isset($customer)
	 value="{{$customer->Neighborhood}}" @endisset required>
</div>

<div class="form-group">
	<label for="">Cidade</label>
	<input type="text" class="form-control" id="city" name="city" placeholder="(Obrigatório)" @isset($customer) value="{{$customer->City}}"
	 @endisset required>
</div>

<div class="form-group">
	<label for="">Estado</label>
	<input type="text" class="form-control" id="state" name="state" placeholder="(Obrigatório)" @isset($customer) value="{{$customer->State}}"
	 @endisset required>
</div>

<div class="form-group">
	<label for="">País</label>
	<input type="text" class="form-control" id="coutry" name="country" placeholder="(Obrigatório)" @isset($customer) value="{{$customer->Country}}"
	 @endisset required>
</div>

{{--
<div class="form-group">
	<label for="">Latitude</label>
	<input type="text" class="form-control" id="lat" name="lat" placeholder="(Opcional)" @isset($customer) value="{{$customer->Lat}}"
	 @endisset>
</div>

<div class="form-group">
	<label for="">Longitude</label>
	<input type="text" class="form-control" id="long" name="long" placeholder="(Opcional)" @isset($customer) value="{{$customer->Long}}"
	 @endisset>
</div> --}}

<!-- <div class="form-group">						
							<label for="">Forma de Pagamento</label>
							<input type="text" class="form-control" id="paymentpreference" name="paymentpreference" placeholder="(Obrigatório)" @isset($customer) value="{{$customer->PaymentPreference}}"
							 @endisset required>
						</div> -->