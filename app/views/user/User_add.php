<section>
    <main class="container pt-5">
        <article class="bg-success-subtle rounded-2 p-2 text-success d-flex align-items-center justify-content-between">
            <span>Kullanıcılar</span>
            <a href="/php/user/" class="btn btn-success">Listele</a>
        </article>
        <article>
            <div class="alert alert-success mt-5 d-flex flex-column" role="alert">
                <h3 class="text-success">Başarıyla Kullanıcı Eklendi</h3>
                <span><?php echo "Kullanıcı Adı: " . $data['username'] .  " " . " Mail Adresi: " . $data['email'] . " Parola: " . $data['password'] ?></span>
                <a class="btn btn-success d-inline mt-5" href="/php/user/">Geri Dön</a>
            </div>
        </article>
    </main>
</section>