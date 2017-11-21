# EasyPets

<h2> Instalando e usando o projeto com o XAMPP </h2>
<ol>
    <li> Instalar o XAMPP -> <a href="https://www.apachefriends.org/xampp-files/7.1.11/xampp-win32-7.1.11-0-VC14-installer.exe" target="_blank">link</a> </li>
    <li> Instalar o Composer -> <a href="https://getcomposer.org/Composer-Setup.exe" target="_blank">link</a>.<br> Aqui ele vai pedir para você mostrar o caminho do executável do php do xampp, se você instalou na pasta padrão é no caminho c:\xampp\php e escolher o php.exe </li>
    <li> Instalar o git bash -> <a href="https://git-scm.com/download/win">link pra escolher a versão do windows</a>.Pode dando continuar e deixando tudo no padrão mesmo.<br> Após a instalação clique com o botão direito no desktop ou windows explorer, deverá aparecer 2 itens novos: Git Bash here e Git GUI Here.
    </li>
    <li> Entrar na pasta do XAMPP e continuar na pasta HTDOCS</li>
    <li> Clicar com o botão direito e selecionar "GIT BASH HERE" -> COPIE E COLE ESSE COMANDO <br>
        git clone https://github.com/victorldomingues/EasyPets.git
    </li>
    <li>
        Após o processo aparecerá a pasta EasyPets, entre nela e clique novamente clique com o botão direito e va no "GIT BASH HERE" e escreve o seguinte comando: <br>
        composer install<br>
        Irá baixar e instalar todo o pacote
    </li>
    <li>
        Para rodar o servidor escreve na linha de comando dentro da pasta ou se tiver o git bash here aberto:<br>
        php artisan serve
    </li>
</ol>

        
