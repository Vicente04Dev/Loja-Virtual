<main class="flex-fill">
            <div class="container">
                <div class="row justify-content-center">
                    <form class="col-sm-10 col-md-8 col-lg-6">
                        <h1>Identifique-se, por favor</h1>

                        <div class="form-floating mb-3">
                            <input type="email" name="email" id="email" class="form-control" placeholder=" " autofocus>
                            <label for="email">E-mail</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" id="senha" name="senha" class="form-control" placeholder=" ">
                            <label for="senha">Senha</label>
                        </div>

                        <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" value="" id="chkLembrar">
                            <label for="chkLembrar" class="form-check-label">Lembrar de mim</label>
                        </div>

                        <button type="submit" class="btn btn-danger">Entrar</button>

                        <p class="mt-3">
                            Ainda não é cadastrado? <a href="/newuser" class="text-decoration-none text-danger">Clique aqui</a> para se cadastrar.
                        </p>

                        <p class="mt-3">
                            Esqueceu sua senha? <a href="/recuperarsenha.html" class="text-decoration-none text-danger">Clique aqui</a> para recuperá-la.
                        </p>
                    </form>
                </div>
            </div>
        </main>