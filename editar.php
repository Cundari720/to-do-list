<?php
session_start();
if (!isset($_SESSION["usuario_id"])) {
    header("Location: login.php");
    exit;
}

include 'conexao.php';

$id = isset($_GET['id']) ? $_GET['id'] : null;
$usuario_id = $_SESSION["usuario_id"];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $status = $_POST['status'];

    $sql = "UPDATE tarefas SET titulo = :titulo, descricao = :descricao, status = :status WHERE id = :id AND usuario_id = :usuario_id";
    $stmt = $conexao->prepare($sql);
    
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':descricao', $descricao);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':usuario_id', $usuario_id);
    $stmt->execute();
    
    header("Location: index.php");
    exit;
}

$sqlBusca = "SELECT * FROM tarefas WHERE id = :id AND usuario_id = :usuario_id";
$stmt = $conexao->prepare($sqlBusca);
$stmt->bindParam(':id', $id);
$stmt->bindParam(':usuario_id', $usuario_id);
$stmt->execute();
$tarefa = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$tarefa) {
    header("Location: index.php");
    exit;
}

include 'header.php';
?>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4>Editar Tarefa</h4>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">Título</label>
                        <input type="text" name="titulo" class="form-control" value="<?= htmlspecialchars($tarefa['titulo']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descrição</label>
                        <textarea name="descricao" class="form-control" rows="4"><?= htmlspecialchars($tarefa['descricao']) ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="pendente" <?= $tarefa['status'] === 'pendente' ? 'selected' : '' ?>>Pendente</option>
                            <option value="concluida" <?= $tarefa['status'] === 'concluida' ? 'selected' : '' ?>>Concluída</option>
                        </select>
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                        <a href="index.php" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>