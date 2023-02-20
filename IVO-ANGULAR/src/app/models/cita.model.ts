export class Citas {
  constructor(
    public fecha_creacion: Date,
    public fecha_fin: Date,
    public especialidad: string,
    public descripcion: string,
    public dni_medico: string,
    public dni_paciente: string
  ) {}
}
