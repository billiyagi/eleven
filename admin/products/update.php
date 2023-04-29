<?php
require_once('../../system/bootstrap.php');
$product = $productsModel->get($_GET['id']);
$size = ['S', 'M', 'L', 'XL', 'XXL'];

if (empty($product)) {
    return header('Location: ' . BASE_URL_ADMIN . 'products.php');
}

require_once('../session_admin.php');

$titlePage = 'Update Product';
require_once('../../system/templates/admin/header.php');
require_once('../../system/templates/admin/side_menu.php');

?>


<form action="<?php echo BASE_URL_SYSTEM . 'request.php'; ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
    <main id="adminMainContent">
        <div class="container-fluid px-3 py-4">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="<?php echo assets('uploads/' . $product->image); ?>" alt="" height="300px" id="tumbnail" class="w-100 img-thumbnail">
                            <label for="thumbnail" class="form-label mt-3">Max thumbnail (1MB)</label>
                            <input type="file" id="thumbnail" name="thumbnail" class="form-control file-thumbnail " onchange="previewImg()">
                            <?php echo getFlashValidation('thumbnail'); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Barang</label>
                                <input type="text" name="name" id="name" class="form-control" value="<?php echo $product->nama; ?>">
                                <?php echo getFlashValidation('name'); ?>
                            </div>
                            <div class="mb-3">
                                <label for="sales" class="form-label">Harga jual</label>
                                <input type="text" name="sale_price" id="sales" class="form-control" value="<?php echo $product->harga_jual; ?>">
                                <?php echo getFlashValidation('sale_price'); ?>
                            </div>
                            <div class="mb-3">
                                <label for="purchase" class="form-label">Harga Pembelian</label>
                                <input type="text" name="purchase_price" id="purchase" class="form-control" value="<?php echo $product->harga_beli; ?>">
                                <?php echo getFlashValidation('purchase_price'); ?>
                            </div>
                            <div class="mb-3">
                                <label for="stok" class="form-label">Stok</label>
                                <input type="number" name="stok" id="stok" class="form-control" value="<?php echo $product->stok; ?>">
                                <?php echo getFlashValidation('stok'); ?>
                            </div>
                            <div class="mb-3">
                                <label for="stokMinimal" class="form-label">Minimal stok yang tersedia</label>
                                <input type="number" name="stok_minimal" id="stokMinimal" class="form-control" value="<?php echo $product->min_stok; ?>">
                                <?php echo getFlashValidation('stok_min'); ?>
                            </div>
                            <div class="mb-3">
                                <label for="size" class="form-label">Ukuran</label>
                                <select class="form-select" name="size">
                                    <option disabled selected>-- Pilih Ukuran --</option>
                                    <?php for ($i = 0; $i < 5; $i++) : ?>
                                        <?php if ($product->ukuran == $size[$i]) : ?>
                                            <option value="<?php echo $size[$i]; ?>" selected><?php echo $size[$i]; ?></option>
                                        <?php else : ?>
                                            <option value="<?php echo $size[$i]; ?>"><?php echo $size[$i]; ?></option>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                </select>
                                <?php echo getFlashValidation('size'); ?>
                            </div>
                            <div class="mb-3">
                                <label for="editor" class="form-label">Deskripsi Produk</label>
                                <textarea name="description" id="editor" cols="30" rows="10"><?php echo $product->deskripsi; ?></textarea>
                                <div id="editor"></div>
                                <?php echo getFlashValidation('description'); ?>
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label">Jenis</label>
                                <select class="form-select" name="category_id">
                                    <option selected disabled>-- Pilih Jenis Produk --</option>
                                    <?php foreach ($typesProductModel->getAll() as $typeProduct) : ?>
                                        <?php if ($product->kategori_id == $typeProduct->id) : ?>
                                            <option value="<?php echo $typeProduct->id; ?>" selected><?php echo $typeProduct->nama; ?></option>
                                        <?php else : ?>
                                            <option value="<?php echo $typeProduct->id; ?>"><?php echo $typeProduct->nama; ?></option>
                                        <?php endif ?>
                                    <?php endforeach; ?>
                                </select>
                                <?php echo getFlashValidation('thumbnail'); ?>
                            </div>
                            <div class="mt-5 d-flex justify-content-end">
                                <button type="submit" name="update_product" class="btn btn-primary">Ubah Produk</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</form>
<script>
    function previewImg() {
        const thumbnail = document.querySelector('#tumbnail');
        const inputFile = document.querySelector('.file-thumbnail');

        const fileThumbnail = new FileReader();
        fileThumbnail.readAsDataURL(inputFile.files[0]);
        fileThumbnail.onload = function(e) {
            thumbnail.src = e.target.result;
        }
    }

    CKEDITOR.replace('editor');
    var cleave = new Cleave('#sales', {
        numeral: true,
        delimiters: ['.', '.', '-'],
        blocks: [3, 3, 3, 2],
        numeralThousandsGroupStyle: 'thousand'
    });
    var cleave = new Cleave('#purchase', {
        numeral: true,
        delimiters: ['.', '.', '-'],
        blocks: [3, 3, 3, 2],
        numeralThousandsGroupStyle: 'thousand'
    });
</script>
<?php require_once('../../system/templates/admin/footer.php') ?>