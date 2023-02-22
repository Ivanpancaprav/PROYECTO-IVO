export class historias_clinicas {
  constructor(
    public n_historia?: number,
    public tratamiento?: string,
    public progreso?: string,
    public fecha_fin?: Date,
    public fecha_inicio?: Date,
    public dni_paciente?: BigInt,
    public dni_medico?: BigInt
  ) {}
}
