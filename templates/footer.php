</div>
<footer id="footer">
    <div id="social-container">
        <ul>
            <li>
                <a href=""><i class="fab fa-facebook-square"></i></a>
            </li>
            <li>
                <a href=""><i class="fab fa-instagram"></i></a>
            </li>
            <li>
                <a href=""><i class="fab fa-youtube"></i></a>
            </li>
        </ul>
    </div>

    <div id="footer-links-container">
        <ul>
            <li><a href="">Adicionar Filme</a></li>
            <li><a href="">Adicionar Criticas</a></li>
            <?php if(empty($userdata)): ?>
                <li><a href="">Entrar / Registrar</a></li>
            <?php endif;?>
        </ul>
    </div>
    <p>&copy; 2023 Talisson Souza</p>
</footer>
</body>

</html>