<style>
  .footer {
    position: fixed;
    bottom: 0;
    left: 240px;
    width: calc(100% - 240px);
    height: 55px;
    background: #ffffff;
    border-top: 1px solid #dcdcdc;
    font-size: 14px;
    color: #555;
    z-index: 90;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 -2px 8px rgba(0,0,0,0.05);
  }

  @media (max-width: 992px) {
    .footer {
      left: 0;
      width: 100%;
    }
  }
</style>

<footer class="footer text-center">
  <span>© <?= date('Y') ?> Politeknik Negeri Batam — Portofolio Proyek PBL</span>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
