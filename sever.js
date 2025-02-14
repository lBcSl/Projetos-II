import express from "express";
import pool from "./db.js";

const app = express();
app.use(express.json());

// Rota para listar usuários
app.get("/usuarios", async (req, res) => {
  try {
    const [rows] = await pool.query("SELECT * FROM Usuarios");
    res.json(rows);
  } catch (error) {
    res.status(500).json({ error: error.message });
  }
});

// Iniciar servidor
app.listen(3000, () => {
  console.log("Servidor rodando na porta 3000");
});
