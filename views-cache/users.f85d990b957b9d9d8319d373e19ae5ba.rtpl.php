<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content">
    <div class="content-inside">
        <div class="my-4">
            <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                <li class="nav-item">
                    <a style="background-color: #088A08;color: white" class="nav-link active" id="home-tab"
                        data-toggle="tab" role="tab" aria-controls="home" aria-selected="false"><b>Usúários - 
                          <?php if( totalUsers() == 0 ){ ?>

                          Nenhum Usuário cadastrado
                          <?php }elseif( totalUsers() == 1 ){ ?>

                          <?php echo totalCalls(); ?> 1 Usuário cadastrado 
                          <?php }else{ ?>

                          <?php echo totalUsers(); ?> Usuários cadastrados 
                          <?php } ?> </b></a>
                </li>
            </ul>
        

         <?php if( $profileMsg != '' ){ ?>

            <div class="alert alert-success">
                <b><?php echo $profileMsg; ?></b>
            </div>
            <?php } ?>


            <?php if( $errorRegister != '' ){ ?>

            <div class="alert alert-danger">
               <b> <?php echo $errorRegister; ?></b>
            </div>
            <?php } ?>

        <div class="table-responsive">
           <button data-toggle="modal"  data-target="#registerModal"class="btn btn-primary"><b>Cadastrar Usuário</b> </button>
           <div style="float: right">
                  <form  action="/admin/users" method="get" >
                        <div class="input-group">
                          <input   type="text" name="search"  class="form-control" placeholder="Digite sua pesquisa...">
                              <span  class="input-group-btn">
                                <button  class="btn btn" style="background-color: #088A08;color: white" type="submit"  id="search-btn"  ><i class="fa fa-search"style="font-size:13px;" > PESQUISAR</i>
                                </button>
                              </span>
                        </div>
                      </form>
                 </div><br><br>
            <table class="table table-hover  table-bordered">
                <thead style="background-color: #D8D8D8">
                  <tr style="font-size: 16px; font-weight: bold; " >
                
                     <th ><center>Foto<b></th>
                    <th  ><center>Nome<b></th>
                    <th ><center>E-mail</th>
                    <th><center>Login</th>
                    <th><center>Telefone</th>
                    <th><center>Cidade</th>
                    <th ><center>Endereço</th>
                    <th><center>Data de Nascimento</th>   
                    <th ><center>Administrador</th>
                    <th ><center>Data de Registro</th>
                    <th ><center>Editar ou Excluir</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $counter1=-1;  if( isset($users) && ( is_array($users) || $users instanceof Traversable ) && sizeof($users) ) foreach( $users as $key1 => $value1 ){ $counter1++; ?>

                  <tr style="font-size: 15px;font-weight: normal;">
                    
                    <td><br><center> 
                      <?php if( $value1["picture"] == 0 && $value1["genre"] == 1 ){ ?>

                      <img src="/../res/ft_perfil/ft_male.png" style="height: 50px;width: 50px;border-radius: 30px;">
                      <?php }elseif( $value1["picture"] == 0 && $value1["genre"] == 2 ){ ?>

                      <img src="/../res/ft_perfil/ft_female.png" style="height: 50px;width: 50px;border-radius: 30px;">
                      <?php }elseif( $value1["picture"] == 0 && $value1["genre"] == 3 ){ ?>

                      <img src="/../res/ft_perfil/ft_unknown.png" style="height: 50px;width: 50px;border-radius: 30px;">
                      <?php }else{ ?>

                      <img src="/../res/ft_perfil/<?php echo $value1["picture"]; ?>" style="height: 50px;width: 50px;border-radius: 30px;">
                      <?php } ?>

                    </td>
                    <td><br><center><?php echo $value1["person"]; ?></td>
                    <td><br><center><?php echo $value1["email"]; ?></td>
                    <td><br><center><?php echo $value1["login"]; ?></td/>
                    <td><br><center><?php echo $value1["phone"]; ?></td>
                    <td><br><center><?php echo $value1["city"]; ?></td/>
                    <td ><br><center><?php echo $value1["address"]; ?></td/>
                    <td><br><center><?php echo formatDate($value1["born_date"]); ?></td>
                    <td><br><center><?php if( $value1["inadmin"] == 1 ){ ?>Sim<?php }else{ ?>Não<?php } ?></td>
                    <td><br><center><?php echo formatDate($value1["dtregister"]); ?></td>
                    <td><br>
                      <center>
                      
                      <?php if( $value1["iduser"] == $user["iduser"] ){ ?>

                    <button style="width: 80px;"   data-toggle="modal" onclick="alertAlterarDados()"  data-target="#dateModal"class="btn btn-primary btn-sm"></i> Editar</button>
                      <?php }else{ ?>

                    <a style="width: 80px;" href="/admin/users/delete/<?php echo $value1["iduser"]; ?>"  onclick="return confirm('Deseja realmente excluir o usuário <?php echo $value1["person"]; ?>?')" class="btn btn-danger btn-sm"> Excluir</a>
                      <?php } ?>


                    </td>
                  </tr>
                  <?php } ?>

                </tbody>
              </table>
                <br>
              <center>
            <div class="box-footer clearfix">
              <ul class="pagination">
               <?php $counter1=-1;  if( isset($pages) && ( is_array($pages) || $pages instanceof Traversable ) && sizeof($pages) ) foreach( $pages as $key1 => $value1 ){ $counter1++; ?>

                          <?php if( $pages == $value1["link"] ){ ?> 
                       <li> <a class="active"href="<?php echo $value1["link"]; ?>"><?php echo $value1["page"]; ?></a></li>
                        <?php }else{ ?>

                        <li><a href="<?php echo $value1["link"]; ?>"><?php echo $value1["page"]; ?></a></li>
                          <?php } ?>

                        <?php } ?>

              </ul>
            </div>
          </center>
          </div>
          
          <a href="javascript:history.back()" class="btn btn-info btn-xs">Voltar</a>
          </div>

          
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
              <option value="Gama - DF">Gama - DF</option>
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

<!-- Modal cadastro -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="registerModal">Cadastrar novo usuário Administrador</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-group" action="/admin/users/register" method="post"><br>


          <div class="form-group"><label class="small mb-1"><b>Nome</b></label>
            <input class="form-control py-1" type="text" name="person" placeholder="Digite o nome do usuário" required />
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

          <div class="form-group"><label class="small mb-1"><b>Login</b></label>
            <input class="form-control py-1"  type="text" name="login" placeholder="Digite o login do usuário"required>
          </div>

          <div class="form-group"><label class="small mb-1"><b>E-mail</b></label>
            <input class="form-control py-1"  type="email" name="email" placeholder="Digite o e-mail do usuário"required>
          </div>


          <div class="form-group"><label class="small mb-1"><b>Telefone</b></label>
            <input class="form-control py-1"  type="tel" name="phone" placeholder="Digite o telefone do usuário"maxlength="13"
              pattern="[0-9]+$" required>
          </div>

          <div class="form-group"><label class="small mb-1"><b>Endereço</b></label>
            <input class="form-control py-1"  type="text" name="address" placeholder="Digite o endereço do usuário" required>
          </div>

          <div class="form-group"><label class="small mb-1"><b>Data de Nascimento</b></label>
            <input class="form-control py-1"  type="date" name="born_date" required>
          </div>

          <div class="form-group"><label class="small mb-1"><b>Cidade</label>
            <select class="form-control " name="city" id="city">
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

          <div class="form-group"><label class="small mb-1"><b>Senha</b></label>
            <input class="form-control py-1"  type="password" name="despassword" placeholder="Digite a senha do usuário"required>
          </div>

          <input class="btn btn-success btn btn-block" type="submit" value="Cadastrar">


        </form>
      </div>
    </div>
  </div>
</div>