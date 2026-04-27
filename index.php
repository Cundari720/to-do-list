<?php
session_start();
if (!isset($_SESSION["usuario_id"])) {
    header("Location: login.php");
    exit;
}

include 'conexao.php';
include 'header.php';

$usuario_id = $_SESSION["usuario_id"];

$sql = "SELECT * FROM tarefas WHERE usuario_id = :usuario_id ORDER BY criado_em DESC";
$stmt = $conexao->prepare($sql);
$stmt->bindParam(':usuario_id', $usuario_id);
$stmt->execute();

$tarefas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Minhas Tarefas</h2>
    <a href="nova.php" class="btn btn-success">+ Nova Tarefa</a>
</div>

<div class="card shadow">
    <div class="card-body p-0">
        <table class="table table-striped table-hover mb-0">
            <thead class="table-dark">
                <tr>
                    <th>Título & Descrição</th>
                    <th>Status</th>
                    <th>Data de Criação</th>
                    <th class="text-end">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($stmt->rowCount() > 0): ?>
                    <?php foreach ($tarefas as $t): ?>
                        <tr>
                            <td class="align-middle">
                                <strong><?= htmlspecialchars($t['titulo']) ?></strong><br>
                                <small class="text-muted"><?= htmlspecialchars($t['descricao']) ?></small>
                            </td>
                            <td class="align-middle">
                                <?php if ($t['status'] === 'concluida'): ?>
                                    <span class="badge bg-success">Concluída</span>
                                <?php else: ?>
                                    <span class="badge bg-warning text-dark">Pendente</span>
                                <?php endif; ?>
                            </td>
                            <td class="align-middle">
                                <?= date('d/m/Y H:i', strtotime($t['criado_em'])) ?>
                            </td>
                            <td class="align-middle text-end">
                                <?php if ($t['status'] === 'pendente'): ?>
                                    <a href="concluir.php?id=<?= $t['id'] ?>" class="btn btn-sm btn-outline-success" title="Concluir">✔</a>
                                <?php endif; ?>
                                <a href="editar.php?id=<?= $t['id'] ?>" class="btn btn-sm btn-outline-primary">Editar</a>
                                <a href="excluir.php?id=<?= $t['id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Excluir esta tarefa definitivamente?')">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center py-4">Nenhuma tarefa encontrada. Aproveite seu dia livre!</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'footer.php'; ?>