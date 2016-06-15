<? include('meta.php');

include('lib/DBMySql.php');
include('classe/bo/sobreBO.php');

$sobreBO = new sobreBO();

$texto = $sobreBO->get();

include("header.php");
?>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p>Preencha o campo a seguir com informações, imagens e vídeos sobre o HD Elite Team:</p>
                <form method="POST" action="action/hd-action.php">
                    <textarea name="texto" rows="5" cols="20"><?=$texto['texto']?></textarea>
                    <br>
                    <input type="submit">
                </form>
                <script language="javascript">
                            CKEDITOR.replace('texto', {
                                    filebrowserBrowseUrl : ' uploadEditor.php?action=browse',
                                    filebrowserUploadUrl : ' uploadEditor.php?action=upload',
                                    height: 450 }
                            );
                </script>
            </div>
        </div>
    </div>
    <!-- /.container -->



