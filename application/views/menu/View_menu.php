<?php $xd = $_SESSION['sistemaoperativo'];
if ($xd == 'iPhone' || $xd == 'iPad' || $xd == 'Android' || $xd == 'BlackBerry'): ?>
    <h3 align="center">Gestion de menú</h3>
    <button type="button" class="btn btn-primary" id="create_acc_btn" data-toggle="modal" data-target="#create_form_modal">Agregar menu<i class=""></i></button>
    <br><br>
    <div class="col-md-4">
        <p>
            <strong>Mostrar por : </strong>
            <select name="cantidad" id="cantidad">
                <option value="5">5</option>
                <option value="10">10</option>
            </select>
        </p>
    </div>
    <div class="col-md-4 col-md-offset-4" >
        <input type="text" class="form-control" name="busqueda" placeholder="Escribe el nombre del menu" />
        <br>
    </div>

    <table id="tbmenu" class="table table-responsive" width="100%">
        <thead>
            <tr>
                <th class="info"  width="15%">#</th>
                <th class="info" width="30%">Menu</th>
                <th class="info" width="60%">Icono</th>
                <th class="info" width="100%">Acciones</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <div class="text-center paginacion">
    </div>

<?php else: ?>
    <div class="container-fluid" style="background: #fff;box-shadow: 8px 8px 4px 0px rgba(0,0,0,.5);border: 1px solid #C8C4C4;">
        <h3 align="center">Gestion de menú</h3>
        <button type="button" class="btn btn-primary" id="create_acc_btn" data-toggle="modal" data-target="#create_form_modal">Agregar menu<i class=""></i></button>
        <br><br>
        <div class="col-md-4">
            <p>
                <strong>Mostrar por : </strong>
                <select name="cantidad" id="cantidad">
                    <option value="5">5</option>
                    <option value="10">10</option>
                </select>
            </p>
        </div>
        <div class="col-md-4 col-md-offset-4" >
            <input type="text" class="form-control" name="busqueda" placeholder="Escribe el nombre del menu" />
            <br>
        </div>

        <table id="tbmenu" class="table table-responsive" width="100%">
            <thead>
                <tr>
                    <th class="info"  width="15%">#</th>
                    <th class="info" width="30%">Menu</th>
                    <th class="info" width="60%">Icono</th>
                    <th class="info" width="100%">Acciones</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <div class="text-center paginacion">
        </div>
    </div>
<?php endif ?>         




<div class="modal" id="create_form_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header pmd-modal-bordered">
                <h2 class="pmd-cart-title-text" id="form-title">Crear mascota</h2>
            </div>
            <form class="" id="developer_cu_form">
                <div class="modal-body">
                    <div class="form-group pmd-textfield pmd-text-field-floating-label">
                        <label for="Developer Skill" class="control-label">Menu</label>
                        <input type="text" class="form-control" name="menu" id="menu">
                    </div>

                    <label for="Developer Skill" class="control-label">Icono</label>
                    <select name="icono" id="icono"  class="form-control se" style="width: 100%;">
                        <option selected="selected">Buscar icono</option>
                        <option value="fa fa-align-left" data-icon="fa fa-align-left">fa-align-left</option>
                        <option value="fa fa-align-right" data-icon="fa fa-align-right">fa-align-right</option>
                        <option value="fa fa-amazon" data-icon="fa fa-amazon">fa-amazon</option>
                        <option value="fa fa-ambulance" data-icon="fa fa-ambulance">fa-ambulance</option>
                        <option value="fa fa-anchor" data-icon="fa-anchor">fa-anchor</option>
                        <option value="fa fa-android" data-icon="fa-android">fa-android</option>
                        <option value="fa fa-angellist" data-icon="fa-angellist">fa-angellist</option>
                        <option value="fa fa-angle-double-down" data-icon="fa-angle-double-down">fa-angle-double-down</option>
                        <option value="fa fa-angle-double-left" data-icon="fa-angle-double-left">fa-angle-double-left</option>
                        <option value="fa fa-angle-double-right" data-icon="fa-angle-double-right">fa-angle-double-right</option>
                        <option value="fa fa-angle-double-up" data-icon="fa-angle-double-up">fa-angle-double-up</option>

                        <option value="fa fa fa-angle-left" data-icon="fa-angle-left">fa-angle-left</option>
                        <option value="fa fa-angle-right" data-icon="fa-angle-right">fa-angle-right</option>
                        <option value="fa fa-angle-up" data-icon="fa-angle-up">fa-angle-up</option>
                        <option value="fa fa-apple" data-icon="fa-apple">fa-apple</option>
                        <option value="fa fa-archive" data-icon="fa-archive">fa-archive</option>
                        <option value="fa fa-area-chart" data-icon="fa-area-chart">fa-area-chart</option>
                        <option value="fa fa-arrow-circle-down" data-icon="fa-arrow-circle-down">fa-arrow-circle-down</option>
                        <option value="fa fa-arrow-circle-left" data-icon="fa-arrow-circle-left">fa-arrow-circle-left</option>
                        <option value="fa fa-arrow-circle-o-down"data-icon="fa-arrow-circle-o-down">fa-arrow-circle-o-down</option>
                        <option value="fa fa-arrow-circle-o-left"data-icon="fa-arrow-circle-o-left">fa-arrow-circle-o-left</option>
                        <option value="fa fa-arrow-circle-o-right"data-icon="fa-arrow-circle-o-right">fa-arrow-circle-o-right</option>
                        <option value="fa fa-arrow-circle-o-up"data-icon="fa-arrow-circle-o-up">fa-arrow-circle-o-up</option>
                        <option value="fa fa-arrow-circle-right"data-icon="fa-arrow-circle-right">fa-arrow-circle-right</option>
                        <option value="fa fa-arrow-circle-up"data-icon="fa-arrow-circle-up">fa-arrow-circle-up</option>
                        <option value="fa fa-arrow-down"data-icon="fa-arrow-down">fa-arrow-down</option>
                        <option value="fa fa-arrow-left"data-icon="fa-arrow-left">fa-arrow-left</option>
                        <option value="fa fa-arrow-right" data-icon="fa-arrow-right">fa-arrow-right</option>
                        <option value="fa fa-arrow-up" data-icon="fa-arrow-up">fa-arrow-up</option>
                        <option value="fa fa-arrows" data-icon="fa-arrows">fa-arrows</option>
                        <option value="fa fa-arrows-alt" data-icon="fa-arrows-alt">fa-arrows-alt</option>
                        <option value="fa fa-arrows-h" data-icon="fa-arrows-h">fa-arrows-h</option>
                        <option value="fa fa-arrows-v" data-icon="fa-arrows-v">fa-arrows-v</option>
                        <option value="fa fa-asterisk" data-icon="fa-asterisk">fa-asterisk</option>
                        <option value="fa fa-at" data-icon="fa-at">fa-at</option>
                        <option value="fa fa-automobile" data-icon="fa-automobile">fa-automobile</option>
                        <option value="fa fa-backward" data-icon="fa-backward">fa-backward</option>
                        <option value="fa fa-balance-scale" data-icon="fa-balance-scale">fa-balance-scale</option>
                        <option value="fa fa-ban" data-icon="fa-ban">fa-ban</option>
                        <option value="fa fa-bank" data-icon="fa-bank">fa-bank</option>
                        <option value="fa fa-bar-chart" data-icon="fa-bar-chart">fa-bar-chart</option>
                        <option value="fa fa-bar-chart-o" data-icon="fa-bar-chart-o">fa-bar-chart-o</option>

                        <option value="fa fa-battery-full" data-icon="fa-battery-full">fa-battery-full</option>
                        <option value="fa fa-behance" data-icon="fa-behance">fa-behance</option>
                        <option value="fa fa-behance-square" data-icon="fa-behance-square">fa-behance-square</option>
                        <option value="fa fa-bell" data-icon="fa-bell">fa-bell</option>
                        <option value="fa fa-bell-o" data-icon="fa-bell-o">fa-bell-o</option>
                        <option value="fa fa-bell-slash" data-icon="fa-bell-slash">fa-bell-slash</option>
                        <option value="fa fa-bell-slash-o" data-icon="fa-bell-slash-o">fa-bell-slash-o</option>
                        <option value="fa fa-bicycle" data-icon="fa-bicycle">fa-bicycle</option>
                        <option value="fa fa-binoculars" data-icon="fa-binoculars">fa-binoculars</option>
                        <option value="fa fa-birthday-cake" data-icon="fa-birthday-cake">fa-birthday-cake</option>
                        <option value="fa fa-bitbucket" data-icon="fa-bitbucket">fa-bitbucket</option>
                        <option value="fa fa-bitbucket-square" data-icon="fa-bitbucket-square">fa-bitbucket-square</option>
                        <option value="fa fa-bitcoin" data-icon="fa-bitcoin">fa-bitcoin</option>
                        <option value="fa fa-black-tie" data-icon="fa-black-tie">fa-black-tie</option>
                        <option value="fa fa-bold" data-icon="fa-bold">fa-bold</option>
                        <option value="fa fa-bolt" data-icon="fa-bolt">fa-bolt</option>
                        <option value="fa fa-bomb" data-icon="fa-bomb">fa-bomb</option>

                        <option value="fa fa-book" data-icon="fa-book"> fa-book</option>
                        <option value="fa fa-bookmark" data-icon="fa-bookmark"> fa-bookmark</option>
                        <option value="fa fa-bookmark-o" data-icon="fa-bookmark-o"> fa-bookmark-o</option>
                        <option value="fa fa-briefcase" data-icon="fa-briefcase"> fa-briefcase</option>
                        <option value="fa fa-btc" data-icon="fa-btc"> fa-btc</option>
                        <option value="fa fa-bug" data-icon="fa-bug"> fa-bug</option>
                        <option value="fa fa-building" data-icon="fa-building"> fa-building</option>
                        <option value="fa fa-building-o" data-icon="fa-building-o"> fa-building-o</option>
                        <option value="fa fa-bullhorn" data-icon="fa-bullhorn"> fa-bullhorn</option>
                        <option value="fa fa-bullseye" data-icon=" fa-bullseye"> fa-bullseye</option>
                        <option value="fa fa-bus" data-icon="fa-bus"> fa-bus</option>
                        <option value="fa fa-cab" data-icon="fa-cab"> fa-cab</option>
                        <option value="fa fa-calendar" data-icon="fa-calendar"> fa-calendar</option>
                        <option value="fa fa-camera" data-icon="fa-camera"> fa-camera</option>
                        <option value="fa fa-car" data-icon="fa-car"> fa-car</option>
                        <option value="fa fa-caret-up" data-icon="fa-caret-up"> fa-caret-up</option>
                        <option value="fa fa-cart-plus" data-icon="fa-cart-plus"> fa-cart-plus</option>
                        <option value="fa fa fa-cc" data-icon="fa-cc">fa-cc</option>
                        <option value="fa fa-cc-amex" data-icon="fa-cc-amex"> fa-cc-amex</option>
                        <option value="fa fa-cc-jcb" data-icon="fa-cc-jcb"> fa-cc-jcb</option>
                        <option value="fa fa-cc-paypal" data-icon="fa-cc-paypal"> fa-cc-paypal</option>
                        <option value="fa fa-cc-stripe" data-icon="fa-cc-stripe"> fa-cc-stripe</option>
                        <option value="fa fa-cc-visa" data-icon="fa-cc-visa"> fa-cc-visa</option>
                        <option value="fa fa-chain" data-icon="fa-chain"> fa-chain</option>
                        <option value="fa fa-check" data-icon="fa-check"> fa-check</option>
                        <option value="fa fa-child" data-icon="fa-child"> fa-child</option>
                        <option value="fa fa-chrome" data-icon="fa-chrome"> fa-chrome</option>
                        <option value="fa fa-circle" data-icon="fa-circle"> fa-circle</option>
                        <option value="fa fa-circle-o" data-icon="fa-circle-o"> fa-circle-o</option>
                        <option value="fa fa-circle-o-notch" data-icon="fa-circle-o-notch"> fa-circle-o-notch</option>
                        <option value="fa fa-circle-thin" data-icon="fa-circle-thin"> fa-circle-thin</option>
                        <option value="fa fa-clipboard" data-icon="fa-clipboard"> fa-clipboard</option>
                        <option value="fa fa-clock-o" data-icon="fa-clock-o"> fa-clock-o</option>
                        <option value="fa fa-clone" data-icon="fa-clone"> fa-clone</option>
                        <option value="fa fa-close" data-icon="fa-close"> fa-close</option>
                        <option value="fa fa-cloud" data-icon="fa-cloud"> fa-cloud</option>
                        <option value="fa fa-cloud-download" data-icon="fa-cloud-download"> fa-cloud-download</option>
                        <option value="fa fa-cloud-upload" data-icon="fa-cloud-upload"> fa-cloud-upload</option>
                        <option value="fa fa-cny" data-icon="fa-cny"> fa-cny</option>
                        <option value="fa fa-code" data-icon="fa-code"> fa-code</option>
                        <option value="fa fa-code-fork" data-icon="fa-code-fork"> fa-code-fork</option>
                        <option value="fa fa-codepen" data-icon="fa-codepen"> fa-codepen</option>
                        <option value="fa fa-coffee" data-icon="fa-coffee"> fa-coffee</option>
                        <option value="fa fa-cog" data-icon="fa-cog"> fa-cog</option>

                        <option value="fa fa-cogs" data-icon="fa-cogs"> fa-cogs</option>
                        <option value="fa fa-columns" data-icon="fa-columns"> fa-columns</option>
                        <option value="fa fa-comment" data-icon="fa-comment"> fa-comment</option>
                        <option value="fa fa-comment-o" data-icon="fa-comment-o">fa-comment-o</option>
                        <option value="fa fa-copy" data-icon="fa-copy">fa-copy</option>
                        <option value="fa fa-copyright" data-icon="fa-copyright"> fa-copyright</option>
                        <option value="fa fa-creative-commons" data-icon="fa-creative-commons"> fa-creative-commons</option>
                        <option value="fa fa-credit-card" data-icon="fa-credit-card">fa-credit-card</option>
                        <option value="fa fa-external-link" data-icon="fa-external-link"> fa-external-link</option>

                        <option value="fa fa-external-link-square" data-icon="fa-external-link-square">fa-external-link-square</option>
                        <option value="fa fa-eye" data-icon="fa-eye">fa-eye</option>
                        <option value="fa fa-eye-slash" data-icon="fa-eye-slash">fa-eye-slash</option>
                        <option value="fa fa-eyedropper" data-icon="fa-eyedropper">fa-eyedropper</option>
                        <option value="fa fa-facebook" data-icon="fa-facebook">fa-facebook</option>
                        <option value="fa fa-fax" data-icon="fa-fax">fa-fax</option>
                        <option value="fa fa-feed" data-icon="fa-feed" >fa-feed</option>
                        <option value="fa fa-file-archive-o" data-icon="">fa-file-archive-o</option>
                        <option value="fa fa-file-audio-o" data-icon="fa-file-audio-o">fa-file-audio-o</option>
                        <option value="fa fa-file-code-o" data-icon="fa-file-code-o"> fa-file-code-o</option>
                        <option value="fa fa-file-excel-o" data-icon="fa-file-excel-o"> fa-file-excel-o</option>
                        <option value="fa fa-file-image-o" data-icon="fa-file-image-o">fa-file-image-o</option>
                        <option value="fa fa-file-movie-o" data-icon="fa-file-movie-o">fa-file-movie-o</option>
                        <option value="fa fa-file-photo-o" data-icon="fa-file-photo-o"> fa-file-photo-o</option>
                        <option value="fa fa-file-word-o" data-icon="fa-file-word-o">fa-file-word-o</option>
                        <option value="fa fa-file-zip-o" data-icon="fa-file-zip-o"> fa-file-zip-o</option>
                        <option value="fa fa-firefox" data-icon="fa-firefox"> fa-firefox</option>
                        <option value="fa fa-folder" data-icon="fa-folder"> fa-folder</option>
                        <option value="fa fa-folder-o" data-icon="fa-folder-o"> fa-folder-o</option>
                        <option value="fa fa-folder-open" data-icon="fa-folder-open"> fa-folder-open</option>
                        <option value="fa fa-folder-open-o" data-icon="fa-folder-open-o"> fa-folder-open-o</option>
                        <option value="fa fa-font" data-icon="fa-font"> fa-font</option>
                        <option value="fa fa-fonticons" data-icon="fa-fonticons"> fa-fonticons</option>
                        <option value="fa fa-forumbee" data-icon="fa-forumbee"> fa-forumbee</option>
                        <option value="fa fa-forward" data-icon="fa-forward"> fa-forward</option>
                        <option value="fa fa-foursquare" data-icon="fa-foursquare"> fa-foursquare</option>
                        <option value="fa fa-frown-o" data-icon="fa-frown-o"> fa-frown-o</option>
                        <option value="fa fa-futbol-o" data-icon="fa-futbol-o"> fa-futbol-o</option>
                        <option value="fa fa-git-square" data-icon="fa-git-square"> fa-git-square</option>
                        <option value="fa fa-github" data-icon="fa-github"> fa-github</option>
                        <option value="fa fa-google-plus" data-icon="fa-google-plus"> fa-google-plus</option>
                        <option value="fa fa-hospital-o" data-icon="fa-hospital-o"> fa-hospital-o</option>
                        <option value="fa fa-hotel" data-icon="fa-hotel"> fa-hotel</option>
                        <option value="fa fa-i-cursor" data-icon="fa-i-cursor"> fa-i-cursor</option>
                        <option value="fa fa-ils" data-icon="fa-ils"> fa-ils</option>
                        <option value="fa fa-image" data-icon="fa-image">fa-image</option>
                        <option value="fa fa-inbox" data-icon="fa-inbox">fa-inbox</option>
                        <option value="fa fa-microphone" data-icon="fa-microphone"> fa-microphone</option>
                        <option value="fa fa-mobile" data-icon="fa-mobile"> fa-mobile</option>
                        <option value="fa fa-motorcycle" data-icon="fa-motorcycle"> fa-motorcycle</option>
                        <option value="fa fa-mouse-pointer" data-icon="fa-mouse-pointer"> fa-mouse-pointer</option>
                        <option value="fa fa-music" data-icon="fa-music"> fa-music</option>
                        <option value="fa fa-navicon" data-icon="fa-navicon"> fa-navicon</option>
                        <option value="fa fa-neuter" data-icon="fa-neuter"> fa-neuter</option>
                        <option value="fa fa-newspaper-o" data-icon="fa-newspaper-o"> fa-newspaper-o</option>
                        <option value="fa fa-opencart" data-icon="fa-opencart"> fa-opencart</option>
                        <option value="fa fa-openid" data-icon="fa-openid"> fa-openid</option>
                        <option value="fa fa-opera" data-icon="fa-opera">fa-opera</option>
                        <option value="fa fa-outdent" data-icon="fa-outdent">fa-outdent</option>
                        <option value="fa fa-pagelines" data-icon="fa-pagelines">fa-pagelines</option>
                        <option value="fa fa-paper-plane-o" data-icon=" fa-paper-plane-o"> fa-paper-plane-o</option>
                        <option value="fa fa-paperclip" data-icon="fa-paperclip"> fa-paperclip</option>
                        <option value="fa fa-paragraph" data-icon="fa-pharagraph"> fa-paragraph</option>
                        <option value="fa fa-paste" data-icon="fa-paste"> fa-paste</option>
                        <option value="fa fa-pause" data-icon="fa-pause"> fa-pause</option>
                        <option value="fa fa-paypal" data-icon="fa-paypal"> fa-paypal</option>
                        <option value="fa fa-pencil" data-icon="fa-pencil"> fa-pencil</option>
                        <option value="fa fa-phone" data-icon="fa-phone"> fa-phone</option>
                        <option value="fa fa-photo" data-icon="fa-photo"> fa-photo</option>
                        <option value="fa fa-picture-o" data-icon="fa-picture-o"> fa-picture-o</option>
                        <option value="fa fa-pie-chart" data-icon="fa-pie-chart"> fa-pie-chart</option>
                        <option value="fa fa-pied-piper" data-icon="fa-pied-piper"> fa-pied-piper</option>
                        <option value="fa fa-pinterest" data-icon="fa-pinterest"> fa-pinterest</option>    
                        <option value="fa fa-plane" data-icon="fa-plane">fa-plane</option>
                        <option value="fa fa-play" data-icon="fa-play">fa-play</option>
                        <option value="fa fa-play-circle-o" data-icon="fa-play-circle-o">fa-play-circle-o</option>
                        <option value="fa fa-plug" data-icon="fa-plug">fa-plug</option>
                        <option value="fa fa-plus" data-icon="fa-plus">fa-plus</option>
                        <option value="fa fa-plus-circle" data-icon="fa-plus-circle">fa-plus-circle</option>
                        <option value="fa fa-plus-square" data-icon="fa-plus-square">fa-plus-square</option>
                        <option value="fa fa-plus-square-o" data-icon="fa-plus-square-o"> fa-plus-square-o</option>
                        <option value="fa fa-power-off" data-icon="fa-power-off"> fa-power-off</option>
                        <option value="fa fa-print" data-icon="fa-print"> fa-print</option>
                        <option value="fa fa-puzzle-piece" data-icon="fa-puzzle-piece"> fa-puzzle-piece</option>
                        <option value="fa fa-qq" data-icon="fa-qq"> fa-qq</option>
                        <option value="fa fa-qrcode" data-icon="fa-qrcode"> fa-qrcode</option>
                        <option value="fa fa-question" data-icon="fa-question">fa-question</option>
                        <option value="fa fa-road" data-icon=" fa-road"> fa-road</option>
                        <option value="fa fa-rocket" data-icon="fa-rocket"> fa-rocket</option>
                        <option value="fa fa-rotate-left" data-icon="fa-rotate-left"> fa-rotate-left</option>
                        <option value="fa fa-rotate-right" data-icon="fa-rotate-right"> fa-rotate-right</option>
                        <option value="fa fa-rouble" data-icon="fa-rouble"> fa-rouble</option>
                        <option value="fa fa-rss" data-icon="fa-rss"> fa-rss</option>
                        <option value="fa fa-rss-square" data-icon="fa-rss-square">fa-rss-square</option>
                        <option value="fa fa-rub" data-icon="fa-rub">fa-rub</option>
                        <option value="fa fa-ruble" data-icon="fa-ruble">fa-ruble</option>
                        <option value="fa fa-rupee" data-icon="fa-rupee"> fa-rupee</option>
                        <option value="fa fa-safari" data-icon="fa-safari"> fa-safari</option>
                        <option value="fa fa-sliders" data-icon="fa-sliders"> fa-sliders</option>
                        <option value="fa fa-slideshare" data-icon="fa-slideshare"> fa-slideshare</option>
                        <option value="fa fa-smile-o" data-icon="fa-smile-o"> fa-smile-o</option>
                        <option value="fa fa-sort-asc" data-icon="fa-sort-asc"> fa-sort-asc</option>
                        <option value="fa fa-sort-desc" data-icon="fa-sort-desc"> fa-sort-desc</option>
                        <option value="fa fa-sort-down" data-icon="fa-sort-down">fa-sort-down</option>
                        <option value="fa fa-spinner" data-icon="fa-spinner">fa-spinner</option>
                        <option value="fa fa-spoon" data-icon="fa-spoon">fa-spoon</option>
                        <option value="fa fa-spotify" data-icon="fa-spotify">fa-spotify</option>
                        <option value="fa fa-square" data-icon="fa-square">fa-square</option>
                        <option value="fa fa-square-o" data-icon="fa-square-o">fa-square-o</option>
                        <option value="fa fa-star" data-icon="fa-star">fa-star</option>
                        <option value="fa fa-star-half" data-icon="fa-star-half"> fa-star-half</option>
                        <option value="fa fa-stop" data-icon="fa-stop"> fa-stop</option>
                        <option value="fa fa-subscript" data-icon="fa-subscript"> fa-subscript</option>
                        <option value="fa fa-tablet" data-icon="fa-tablet">fa-tablet</option>
                        <option value="fa fa-tachometer" data-icon="fa-tachometer"> fa-tachometer</option>
                        <option value="fa fa-tag" data-icon="fa-tag"> fa-tag</option>
                        <option value="fa fa-tags" data-icon="fa-tags"> fa-tags</option>
                    </select>


                </div>
                <div class="pmd-modal-action">
                    <input type="hidden" id="updateId" name="updateId">
                    <input type="hidden"  name="action" id="action" value="create">
                    <input type="submit"  name="submit" id="submit" class="btn btn-success" value="Create  Account">
                    <button data-dismiss="modal" class="btn btn-default">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    select{
        font-family: 'FontAwesome', 'sans-serif';
    }
</style>

<script src="<?php echo base_url(); ?>assets/lib/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/main_js/create_menu.js"></script>


<script>
    function iformat(icon) {
    var originalOption = icon.element;
    return $('<span><i class="fa ' + $(originalOption).data('icon') + '"></i> ' + icon.text + '</span>');
}
$('.se').select2({
    width: "100%",
    templateSelection: iformat,
    templateResult: iformat,
    allowHtml: true
});
</script>