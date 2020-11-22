<?php
include __DIR__. './../core/Conexao.php';
include __DIR__. './ActiveRecord.php';
/**
 * Classe Medico - baseado no modelo Active Record (Simplificado) 
 * @author Alvaro Alves
 */
class Medico extends ActiveRecord
{
    protected $table = 'medico';
    protected $idField = 'id';
    protected $logTimestamp = TRUE;

    public function __construct()
    {
 
    }
 
    /**
     * Salvar o registro
     * @return boolean
     */
    public function save()
    {
        $colunas = $this->preparar($this);
        if (!isset($this->id)) {
            $query = "INSERT INTO medico (".
                implode(', ', array_keys($colunas)).
                ") VALUES (".
                implode(', ', array_values($colunas)).");";
        } else {
            foreach ($colunas as $key => $value) {
                if ($key !== 'id') {
                    $definir[] = "{$key}={$value}";
                }
            }
            $query = "UPDATE medico SET ".implode(', ', $definir)." WHERE id='{$this->id}';";
        }
        
        $conexao = Conexao::getInstance();
        
        if ($conexao = Conexao::getInstance()) {
            
            $stmt = $conexao->prepare($query);
            if ($stmt->execute()) {
                return $stmt->rowCount();
            }
        }
        return false;
    }
 
   
 
    /**
     * Retorna uma lista de medicos
     * @return array/boolean
     */
    public static function all()
    {
        $conexao = Conexao::getInstance();
        $stmt    = $conexao->prepare("SELECT * FROM medico;");
        $result  = array();
        if ($stmt->execute()) {
            while ($rs = $stmt->fetchObject(Medico::class)) {
                $result[] = $rs;
            }
        }
        if (count($result) > 0) {
            return $result;
        }
        return false;
    }
 
    /**
     * Retornar o número de registros
     * @return int/boolean
     */
    public static function count()
    {
        $conexao = Conexao::getInstance();
        $count   = $conexao->exec("SELECT count(*) FROM medico;");
        if ($count) {
            return (int) $count;
        }
        return false;
    }
 
    /**
     * Encontra um recurso pelo id
     * @param type $id
     * @return type
     */
    public static function find($id)
    {
        $conexao = Conexao::getInstance();
        $stmt    = $conexao->prepare("SELECT * FROM medico WHERE id='{$id}';");
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                $resultado = $stmt->fetchObject('Medico');
                if ($resultado) {
                    return $resultado;
                }
            }
        }
        return false;
    }
 
    /**
     * Destruir um recurso
     * @param type $id
     * @return boolean
     */
    public static function destroy($id)
    {
        $conexao = Conexao::getInstance();
        if ($conexao->exec("DELETE FROM medico WHERE id='{$id}';")) {
            return true;
        }
        return false;
    }
}