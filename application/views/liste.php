<div class="main-content">
    <div class="header fade-in">
        <div>
            <h1>Liste des candidatures</h1>
            <p class="header-subtitle">Gestion des candidatures enregistrées</p>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="stats-grid fade-in">
        <div class="stat-card postulants">
            <div class="stat-content">
                <div class="stat-info">
                    <h3><?php echo $nbtotal; ?></h3>
                    <p>Candidatures totales</p>
                </div>
                <div class="stat-icon">
                    <i class="bi bi-people"></i>
                </div>
            </div>
        </div>

        <div class="stat-card candidats">
            <div class="stat-content">
                <div class="stat-info">
                    <h3><?php echo $nbDeposer; ?></h3>
                    <p>Candidatures déposées</p>
                </div>
                <div class="stat-icon">
                    <i class="bi bi-file-earmark-check"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Candidates Table -->
    <div class="candidates-section fade-in">
        <div class="section-header">
            <h2 class="section-title">Toutes les candidatures</h2>
            <div class="section-actions">
                <div class="btn-group">
                    <button class="btn-modern btn-primary-modern dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-printer me-1"></i>
                        Actions générales
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?php echo site_url('impression/imprimer_liste'); ?>"><i class="bi bi-download me-2"></i>Imprimer toute la liste</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="<?php echo site_url('impression/imprimer_liste/1'); ?>"><i class="bi bi-file-earmark-text me-2"></i>Comptabilité publique</a></li>
                        <li><a class="dropdown-item" href="<?php echo site_url('impression/imprimer_liste/2'); ?>"><i class="bi bi-file-earmark-text me-2"></i>Gestion Budgétaire</a></li>
                        <li><a class="dropdown-item" href="<?php echo site_url('impression/imprimer_liste/3'); ?>"><i class="bi bi-file-earmark-text me-2"></i>Finances Publiques locales</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-file-excel me-2"></i>Exporter vers Excel</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="table-container">
            <div class="modern-table-container">
                <?php echo $table; ?>
            </div>
            <div class="pagination-container mt-3">
                <?php echo $pagination; ?>
            </div>
        </div>
    </div>
</div>

<style>
    :root {
        --primary-color: #570ba6;
        --primary-gradient: linear-gradient(135deg, #570ba6 0%, #764ba2 100%);
        --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        --success-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        --warning-gradient: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
        --dark-gradient: linear-gradient(135deg, #434343 0%, #000000 100%);
        --card-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        --card-shadow-hover: 0 15px 40px rgba(0, 0, 0, 0.15);
        --border-radius: 16px;
        --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .main-content {
        margin-left: 280px;
        padding: 2rem;
        transition: var(--transition);
    }

    .header {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        border-radius: var(--border-radius);
        padding: 1.5rem 2rem;
        margin-bottom: 2rem;
        box-shadow: var(--card-shadow);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .header h1 {
        font-size: 2rem;
        font-weight: 700;
        color: #570ba6;
        margin-bottom: 0.5rem;
    }

    .header-subtitle {
        color: #718096;
        font-size: 0.95rem;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .stat-card {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        border-radius: var(--border-radius);
        padding: 2rem;
        box-shadow: var(--card-shadow);
        border: 1px solid rgba(255, 255, 255, 0.2);
        transition: var(--transition);
        position: relative;
        overflow: hidden;
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--primary-gradient);
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--card-shadow-hover);
    }

    .stat-card.postulants::before {
        background: var(--secondary-gradient);
    }

    .stat-card.candidats::before {
        background: var(--success-gradient);
    }

    .stat-content {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .stat-info h3 {
        font-size: 2.5rem;
        font-weight: 700;
        color: #570ba6;
        margin-bottom: 0.5rem;
    }

    .stat-info p {
        color: #718096;
        font-weight: 500;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .stat-icon {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: #fff;
    }

    .stat-card.postulants .stat-icon {
        background: var(--secondary-gradient);
    }

    .stat-card.candidats .stat-icon {
        background: var(--success-gradient);
    }

    .candidates-section {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        border-radius: var(--border-radius);
        box-shadow: var(--card-shadow);
        border: 1px solid rgba(255, 255, 255, 0.2);
        overflow: hidden;
    }

    .section-header {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        padding: 1.5rem 2rem;
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .section-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: #570ba6;
        margin: 0;
    }

    .section-actions {
        display: flex;
        gap: 0.5rem;
    }

    .btn-modern {
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-weight: 500;
        font-size: 0.85rem;
        transition: var(--transition);
        border: none;
        cursor: pointer;
    }

    .btn-primary-modern {
        background: var(--primary-gradient);
        color: #fff;
    }

    .btn-primary-modern:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(87, 11, 166, 0.4);
    }

    .table-container {
        padding: 2rem;
    }

    .modern-table-container {
        width: 100%;
        overflow-x: auto;
    }

    .modern-table-container table {
        width: 100%;
        border-collapse: collapse;
        background: transparent;
    }

    .modern-table-container th {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        color: #495057;
        font-weight: 600;
        padding: 1rem;
        text-align: left;
        border: none;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .modern-table-container td {
        padding: 1rem;
        border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        vertical-align: middle;
    }

    .modern-table-container tr {
        transition: var(--transition);
    }

    .modern-table-container tr:hover {
        background: rgba(87, 11, 166, 0.05);
    }

    .pagination-container {
        display: flex;
        justify-content: center;
    }

    .pagination-container ul.pagination {
        display: flex;
        gap: 0.5rem;
    }

    .pagination-container ul.pagination li {
        list-style: none;
    }

    .pagination-container ul.pagination li a {
        padding: 0.5rem 1rem;
        border-radius: 8px;
        background: #fff;
        border: 1px solid #e2e8f0;
        color: #570ba6;
        text-decoration: none;
        transition: var(--transition);
    }

    .pagination-container ul.pagination li.active a {
        background: var(--primary-gradient);
        color: #fff;
        border-color: #570ba6;
    }

    .pagination-container ul.pagination li a:hover {
        background: rgba(87, 11, 166, 0.1);
    }

    .dropdown-menu {
        border-radius: var(--border-radius);
        box-shadow: var(--card-shadow-hover);
        border: 1px solid rgba(0, 0, 0, 0.1);
    }

    .dropdown-item {
        padding: 0.5rem 1rem;
        transition: var(--transition);
    }

    .dropdown-item:hover {
        background: rgba(87, 11, 166, 0.1);
        color: #570ba6;
    }

    .dropdown-divider {
        border-color: rgba(0, 0, 0, 0.1);
    }

    /* Animations */
    .fade-in {
        opacity: 0;
        transform: translateY(20px);
        transition: var(--transition);
    }

    @media (max-width: 768px) {
        .main-content {
            margin-left: 0;
            padding: 1rem;
        }

        .stats-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<script>
    // Animation au chargement
    document.addEventListener('DOMContentLoaded', function() {
        const elements = document.querySelectorAll('.fade-in');
        elements.forEach((el, index) => {
            setTimeout(() => {
                el.style.opacity = '1';
                el.style.transform = 'translateY(0)';
            }, index * 150);
        });
    });
</script>
