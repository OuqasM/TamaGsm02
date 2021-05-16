@extends('telephone.layouts.TelephoneLayouts')
@section('contenetCss')
<style>
            body {
          font-family: 'open sans';
          overflow-x: hidden; 
          background: #e8cbc0;
          background: -webkit-linear-gradient(to right, #e8cbc0, #636fa4);
          background: linear-gradient(to right, #e8cbc0, #636fa4);
          min-height: 100vh;
          }

          img {
          max-width: 100%; }


          .tab-content {
          overflow: hidden; }
          .tab-content img {
          width: 100%;
          -webkit-animation-name: opacity;
            animation-name: opacity;
          -webkit-animation-duration: .3s;
            animation-duration: .3s; }

          .card {
          margin-top: 50px;
          background: #eee;
          padding: 3em;
          line-height: 1.5em; }

          @media screen and (min-width: 997px) {
          .wrapper {
          display: -webkit-box;
          display: -webkit-flex;
          display: -ms-flexbox;
          display: flex; } }


          .colors {
          -webkit-box-flex: 1;
          -webkit-flex-grow: 1;
          -ms-flex-positive: 1;
          flex-grow: 1; }

          .product-title, .price, .sizes, .colors {
          text-transform: UPPERCASE;



          font-weight: bold; }

          .checked, .price span {
          color: #ff9f1a; }


          .product-title {
          margin-top: 0; }

          .size {
          margin-right: 10px; }
          .size:first-of-type {
          margin-left: 40px; }


          /*# sourceMappingURL=style.css.map */
</style>
@endsection
@section('content')    
              <div class="card">
                      <form action="/CreateTelephone" class="contact-form" enctype="multipart/form-data" method="POST">
                        {{ csrf_field() }}
                      <div class="wrraper row">
                        <div class="col-md-6" >                      
                            <!-- marque-->
                            <div class="form-group ">
                                <select name="marque" id="catgroup" class="select form-control ">
                                    <option value="" disabled selected>Marque</option>
                                    <option style="background-color:#dcdcc3; font-weight: bold;" disabled value="1000">-- Telephones --</option>
                                    <option value="Huawei">Huawei</option>
                                    <option value="Samsung">Samsung</option>
                                    <option value="Apple">Apple</option>
                                    <option value="Xiaomi">Xiaomi</option>
                                    <option value="Oppo">Oppo</option>
                                    <option value="OnePlus">OnePlus</option>
                                    <option value="Motorola">Motorola</option>
                                    <option value="Sony">Sony</option>
                                    <option value="Autres">Autres</option>
                                    <option style="background-color:#dcdcc3; font-weight: bold;" disabled value="2000">-- Tablettes et Autres --</option>
                                    <option value="HuaweiT">Huawei</option>
                                    <option value="SamsungT">Samsung</option>
                                    <option value="AppleT">Apple</option>
                                    <option value="AutresT">Autres</option>
                                </select>
                            </div>
                            <!-- nom de produit -->
                            <div class="form-group">
                              <input type="text" name="nomproduit" class="form-control" placeholder="Nom De Produit">
                            </div>
                            <!-- description -->
                            <div class="form-group">
                              <textarea name="description" rows="5" class="form-control"
                               aria-multiline="true"  placeholder="Description du produit" cols="50"></textarea>
                              </div>
                            <!-- prix -->
                            <div class="form-group">
                              <input type="number" placeholder="Prix" min="0.0" step="0.1" name="prix" />DH
                            </div>
                            <!-- solde -->
                            <div class="form-group">
                              <input type="number" placeholder="Solde" min="0.0" step="0.1" name="solde" />DH
                            </div>
                        </div>
                        <div class="col-md-6" >                      
                          <!-- configuration -->
                          <table class="table table-striped">
                            
                            <tbody>
                              <tr>
                                <th scope="row">Ram</th>
                                <td><img src="{{ asset('images/ram.png') }}"
                                  width="30" height="30" /></td>
                                <td><span class="price " data-toggle="tooltip" title="small">
                                  <input type="number" class="w-50"  name="ram" /></span> Gb</td>
                                
                              </tr>
                              <tr>
                                <th scope="row">Stockage</th>
                                <td><img src="{{ asset('images/storage.png') }}"
                                  width="30" height="30" /></td>
                                <td><span class="price" data-toggle="tooltip" title="small">
                                  <input type="number" class="w-50" name="stockage"/>
                                </span> Gb</td>
                              </tr>
                              <tr>
                                <th scope="row">Batterie</th>
                                <td><img src="{{ asset('images/battery.png') }}"
                                  width="30" height="30" /></td>
                                <td><span class="price" data-toggle="tooltip" title="small">
                                  <input type="number" class="w-50" name="batterie"/>
                                </span> mA</td>
                              </tr>
                              <tr>
                                <th scope="row">Caméra</th>
                                <td><img src="{{ asset('images/mobile-camera.png') }}"
                                  width="30" height="30" /></td>
                                <td><span class="price" data-toggle="tooltip" title="small">
                                  <input type="number" class="w-50" name="camera"/>  
                                </span> Mp</td>
                              </tr>
                                <th scope="row">Caméra Selfy</th>
                                <td><img src="{{ asset('images/selfie.png') }}"
                                  width="30" height="30" /></td>
                                <td><span class="price" data-toggle="tooltip" title="small">
                                  <input type="number" class="w-50" name="selfie"/>
                                </span> Mp
                                </td>                                
                              </tr>                            
                              <tr>
                                <th scope="row">Ecran</th>
                                <td><img src="{{ asset('images/icran.png') }}"
                                  width="30" class="w-50" height="30" /></td>
                                <td><span class="price" data-toggle="tooltip" title="small">
                                  <input type="number" class="w-50" name="ecran"/>
                                </span> P</td>
                              </tr>
                            </tbody>
                          </table>
                          <!--file-->                
                          <div class="form-group">
                            <input class="btn btn-default" type="file" name="images[]" value="Ajouter des Images" multiple/>
                          </div>
                          <!-- Upload button -->
                          <div class="form-group">
                              <button class="btn btn-default" type="submit" value="upload">Publier l'annonce</button>
                          </div>
                        </div>      
                      </div>  
                    </form>                      
           </div>
  @endsection
@section('contentJs')
<script type="text/javascript">
        FilePond.registerPlugin(
        FilePondPluginFileEncode,
        FilePondPluginFileValidateType,
        FilePondPluginImagePreview,
        FilePondPluginPdfPreview,
        FilePondPluginMediaPreview
        );
        FilePond.create(document.getElementById('images'), {
        name: 'images[]',
        labelIdle: 'Faire glisser ou choisir les images du cour',
        allowFileTypeValidation: true,
        acceptedFileTypes: ['.png', '.jpeg', '.jpg'],
        labelFileTypeNotAllowed: 'Le type du fichier est invalide vous devez choisir une image',
        fileValidateTypeLabelExpectedTypes: 'L\'extension doit être : {allTypes}',
        imagePreviewMaxHeight: 200,
        imageCropAspectRatio: '1:1',
        credits: null,
        instantUpload: false
        });
        FilePond.setOptions({
        server: {
          url: '/filepond/api',
          process: '/process',
          revert: '/process',
          headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
          }
        }
      });
</script>
@endsection