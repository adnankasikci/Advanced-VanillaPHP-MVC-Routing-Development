<section>
    <main class="container pt-5">
        <article class="bg-success-subtle rounded-2 p-2 text-success d-flex align-items-center justify-content-between">
            <span>Kullanıcılar</span>
            <a href="/PHP_advanced/home/listUser" class="btn btn-success">Listele</a>
        </article>
        <article>
            <div class="alert alert-success mt-5 d-flex flex-column" role="alert">
                <h3 class="text-success">Kullanıcı Başarıyla Silindi</h3>
                <span><?php echo "Kullanıcı Adı: " . $username .  " " . " Mail Adresi: " . $email . " Parola: " . $password ?></span>
                <a class="btn btn-success d-inline mt-5" href="/PHP_advanced/home">Geri Dön</a>
            </div>
        </article>
    </main>
</section>