</div>
<footer id="footer">
    <div id="social-container">
        <ul>
            <li>
                <a href="https://github.com/TalissonSouzaDev" target="_blank"><i class="fa-brands fa-github"></i></a>
            </li>
            <li>
                <a href="https://linkedin.com/in/talisson-souza-81a069215/"  target="_blank"><i class="fa-brands fa-linkedin"></i></a>
            </li>
            <li>
                <a href="https://talissonsouzadev.github.io/Portifolio/"  target="_blank"><i class="fa-solid fa-link"></i></a>
            </li>
        </ul>
    </div>

    <div id="footer-links-container">
        <ul>
            <?php if(empty($userdata)): ?>
                <li><a href="./auth.php">Entrar / Registrar</a></li>
            <?php endif;?>
        </ul>
    </div>
    <p>&copy; 2023 Talisson Souza</p>
</footer>
</body>

</html>