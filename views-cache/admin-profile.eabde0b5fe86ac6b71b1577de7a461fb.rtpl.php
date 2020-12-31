<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content">

  <div class="content-inside">

    <div class="my-4">
      <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
        <li class="nav-item">
          <a style="background-color: #5FB404;color: white" class="nav-link active" id="home-tab" data-toggle="tab"
            role="tab" aria-controls="home" aria-selected="false"><b>Perfil<b></a>
        </li>
      </ul>

      <div class="row mt-5 align-items-center">
        <div class="col-md-3 text-center mb-5">
          <div class="avatar avatar-xl">
            <?php if( $user["picture"] == 0 && $user["genre"] == 1 ){ ?>

              <img src="/res/ft_perfil/ft_male.png" class="avatar-img rounded-circle" alt="">
              <?php }elseif( $user["picture"] == 0 && $user["genre"] == 2 ){ ?>

              <img src="/res/ft_perfil/ft_female.png" class="avatar-img rounded-circle" alt="">
              <?php }elseif( $user["picture"] == 0 && $user["genre"] == 3 ){ ?>

              <img src="/res/ft_perfil/ft_unknown.png" class="avatar-img rounded-circle" alt="">
              <?php }else{ ?>

              <img src="/res/ft_perfil/<?php echo $user["picture"]; ?>" class="avatar-img rounded-circle" alt="">
              <?php } ?>

            <br><br><button onclick="alertAlterarFoto()" data-toggle="modal" data-target="#imageModal"
              class="btn btn-primary"><b>Alterar Foto</b> </button>
          </div>
        </div>
        <div class="col">
          <div class="row align-items-center">
            <div class="col-md-7">
              <h4 style="font-size: 25px;color: #585858;" class="mb-1"><?php echo getUserName(); ?></h4>

            </div>
          </div>
          <div class="row mb-4">
            <div class="col-md-7">
              <p class="text-muted">
              <p style="font-size: 18px;color: #585858;" class="small mb-1"><b>Cidade:</b> <?php echo $user["city"]; ?></p>
              <p style="font-size: 18px;color: #585858;" class="small mb-1"><b>Endereço:</b> <?php echo $user["address"]; ?></p>
              <p style="font-size: 18px;color: #585858;" class="small mb-1"><b>Email:</b>
                <?php echo $user["email"]; ?></p>
              <p style="font-size: 18px;color: #585858;" class="small mb-1"><b>Login:</b>
                <?php echo $user["login"]; ?></p>
              <p style="font-size: 18px;color: #585858;" class="small mb-1"><b>Telefone:</b> <?php echo $user["phone"]; ?></p>
              <p style="font-size: 18px;color: #585858;" class="small mb-1"><b>Data Nascimento: </b>
                <?php echo formatDate($user["born_date"]); ?></p>
               <p style="font-size: 18px;color: #585858;" class="small mb-1"><b>Gênero: 
              <?php if( $user["genre"] == 1 ){ ?> </b> Masculino</p>
              <?php }elseif( $user["genre"] == 2 ){ ?> </b> Feminino</p>
              <?php }else{ ?> </b> Outros</p>
              <?php } ?>


            </div>

          </div>
        </div>

      </div>
      <center><button data-toggle="modal" onclick="alertAlterarDados()" data-target="#dateModal"
          class="btn btn-primary"><b>Alterar Dados</b> </button></center>
      <hr class="my-4" />

    </div>


  </div>


</div>

<!-- Modal dados -->
<div class="modal fade" id="dateModal" tabindex="-1" role="dialog" aria-labelledby="dateModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="dateModal">Alterar meus Dados</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-group" action="/admin/profile/update/<?php echo $user["iduser"]; ?>" method="post"><br>


          <div class="form-group"><label class="small mb-1"><b>Nome</b></label>
            <input class="form-control py-1" value='<?php echo getUserName(); ?>' type="text" name="person" required />
          </div>

           <div class="form-group"><label class="small mb-1"><b>Gênero</b></label>
            <select class="form-control py-1" name="genre" id="genre">
            <?php if( $user["genre"] == 1 ){ ?>

            <option value="1">Masculino</option>
            <option value="2">Feminino</option>
            <option value="3">Outros</option>
            <?php }elseif( $user["genre"] == 2 ){ ?>

            <option value="2">Feminino</option>
            <option value="1">Masculino</option>
            <option value="3">Outros</option>
            <?php }else{ ?>

            <option value="3">Outros</option>
            <option value="1">Masculino</option>
            <option value="2">Feminino</option>
            <?php } ?>


            </select>
          </div>

          <div class="form-group"><label class="small mb-1"><b>Telefone</b></label>
            <input class="form-control py-1" value="<?php echo $user["phone"]; ?>" type="tel" name="phone" maxlength="13"
              pattern="[0-9]+$" required>
          </div>

          <div class="form-group"><label class="small mb-1"><b>Endereço</b></label>
            <input class="form-control py-1" value="<?php echo $user["address"]; ?>" type="text" name="address" required>
          </div>

          <div class="form-group"><label class="small mb-1"><b>Data de Nascimento</b></label>
            <input class="form-control py-1" value="<?php echo $user["born_date"]; ?>" type="date" name="born_date" required>
          </div>

          <div class="form-group"><label class="small mb-1"><b>Cidade</label>
            <select class="form-control " name="city" id="city">
              <option value="<?php echo $user["city"]; ?>"><?php echo $user["city"]; ?></option>
              <option value="Brasília - DF">Brasília - DF</option>
              <option value=" Gama - DF">Gama - DF</option>
              <option value="Taguatinga - DF">Taguatinga - DF</option>
              <option value="Brazlândia - DF">Brazlândia - DF</option>
              <option value="Sobradinho - DF">Sobradinho - DF</option>
              <option value="Planaltina - DF">Planaltina - DF</option>
              <option value="Paranoá - DF">Paranoá - DF</option>
              <option value="Núcleo Bandeirante - DF">Núcleo Bandeirante - DF</option>
              <option value="Ceilândia - DF">Ceilândia - DF</option>
              <option value="Guará - DF">Guará - DF</option>
              <option value="Cruzeiro - DF">Cruzeiro - DF</option>
              <option value="Samambaia - DF"> Samambaia - DF</option>
              <option value="Santa Maria- DF">Santa Maria - DF</option>
              <option value="São Sebastião - DF">São Sebastião - DF</option>
              <option value="Recanto das Emas - DF">Recanto das Emas - DF</option>
              <option value="Lago Sul - DF">Lago Sul - DF</option>
              <option value="Riacho Fundo - DF">Riacho Fundo - DF</option>
              <option value="Lago Norte - DF">Lago Norte - DF</option>
              <option value="Candangolândia - DF">Candangolândia - DF</option>
              <option value="Águas Claras- DF">Águas Claras - DF</option>
              <option value="Riacho Fundo II - DF">Riacho Fundo II - DF</option>
              <option value="Sudoeste/Octogonal - DF">Sudoeste/Octogonal - DF</option>
              <option value="Varjão - DF">Varjão - DF</option>
              <option value="Park Way - DF">Park Way - DF</option>
              <option value="SCIA - DF">SCIA - DF</option>
              <option value="Sobradinho II - DF">Sobradinho II - DF</option>
              <option value="Jardim Botânico - DF">Jardim Botânico - DF</option>
              <option value="Itapoã - DF">Itapoã - DF</option>
              <option value="SIA - DF">SIA - DF</option>
              <option value="Vicente Pires - DF">Vicente Pires - DF</option>
              <option value="Fercal - DF">Fercal - DF</option>
              <option value="Sol Nascente/Pôr do Sol - DF">Sol Nascente/Pôr do Sol - DF</option>
              <option value="Arniqueira - DF">Arniqueira - DF</option>

            </select>
          </div>

          <input class="btn btn-primary btn btn-block" type="submit" value="Alterar">


        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal imagem -->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="imageModal">Alterar Foto do Perfil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-group" action="/admin/profile/update_image/<?php echo $user["iduser"]; ?>" method="post"
          enctype="multipart/form-data"><br>


          <div class="form-group"><label class="small mb-1"><b>Foto</b></label>
            <input id="addPhotoProfile" class="form-control py-1" type="file" id="picture" name="picture" required="" />
          </div>

          <input class="btn btn-primary btn btn-block" type="submit" value="Alterar">

        </form>
      </div>
    </div>
  </div>
</div>

</div>

</div>

<script src="/res/user/js/functions.js"></script>