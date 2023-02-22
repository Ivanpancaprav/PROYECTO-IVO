import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders, HttpResponse } from '@angular/common/http';
import { Paciente } from '../models/paciente.model';
import { Citas } from '../models/cita.model';
import { Medicamentos } from '../models/medicamentos.model';
import { Informes } from '../models/informes.model';
import { historias_clinicas } from '../models/historias_clinicas.model';
import { Observable } from 'rxjs';
import { Medico } from '../models/medico.model';

const baseUrl = 'http://localhost/api/';

const httpOptions = {
  headers: new HttpHeaders({
    'Content-type':'applications/json'
  })
}

@Injectable({
  providedIn: 'root'
})
export class UsuariosServiceService {
  [x: string]: any;

  constructor(private Http: HttpClient) { }

  getPacientes(): Observable<Paciente[]> {
    
    return this.Http.get<Paciente[]>(baseUrl + 'pacientes');
  }

  getMedicos(): Observable<Medico[]>{

      return this.Http.get<Medico[]>(baseUrl + 'medicos');
  }

  getPerfil(dni: string): Observable<Paciente> {
    return this.Http.get(baseUrl + 'perfil/' + dni);
  }

  getInforme(id: number): Observable<any> {
    return this.Http.get(baseUrl + 'informe/' + id);
  }

  getInformes() {
    return this.Http.get<Informes[]>(baseUrl + 'informes');
  }

  getHistorias_clinicas() {
    return this.Http.get<historias_clinicas[]>(baseUrl + 'historiasclinicas');
  }


  borrarHistorias_clinicas(id: string): Observable<any> {
    return this.Http.delete(baseUrl + 'borrarHistoriasClinicas/'+id);
  }
  crearCita(cita: Citas): Observable<any>{
    return this.Http.post(baseUrl +'crea_cita',cita,httpOptions);
  }

  getCitas(tipo: number,dni: string,role: string): Observable<Citas[]> {
    if (tipo == 0) {
      return this.Http.get<Citas[]>(baseUrl + 'citas/'+dni+'/'+role);
    } else { return this.Http.get<Citas[]>(baseUrl + 'citasprev/'+dni+'/'+role); }
  }

  getCita(id_cita: number): Observable<any>{
      return this.Http.get<any>(baseUrl+'verCita/'+id_cita);
  }

  citaUpdate(id_cita: number, cita: Citas): Observable<any>{
      return this.Http.put(baseUrl +'citaUpdate/'+id_cita,cita,httpOptions);
  }

  citaDelete(id_cita: number){
    return this.Http.delete(baseUrl+'borraCita/'+id_cita);
  }

  // RUTAS HISTORIAS MEDICAS

  historia_create(historia: historias_clinicas):Observable<any>{
    return this.Http.post(baseUrl+'crea_historia',historia,httpOptions);
  }

  getHistoria(n_historia: number): Observable<any>{
    return this.Http.get(baseUrl+'ver_historia/'+n_historia);
  }

  getHistorias(dni_paciente: string): Observable<any>{
      return this.Http.get<historias_clinicas[]>(baseUrl + 'historias/'+dni_paciente);
  } 

  get_med_in_historia(n_historia: number): Observable<any>{
    return this.Http.get<Medicamentos[]>(baseUrl +'get_medicamento_en_historia/'+n_historia);
  }

}
