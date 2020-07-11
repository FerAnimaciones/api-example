import { Component, OnInit } from '@angular/core';
import { BackendApiService } from "app/services/backend-api.service";
export interface Usuario {
  idusuario: number;
  usuario: string;
  contrasena: string;
}
@Component({
  selector: 'app-lista',
  templateUrl: './lista.component.html',
  styleUrls: ['./lista.component.scss']
})
export class ListaComponent implements OnInit {
  public Usuarios:Usuario[]=[];
  constructor(
    private api: BackendApiService,
  ) {
    this.api.getData("lista")
    .subscribe(
      response => {
        this.Usuarios=response.lista;
      },
      err => {
        console.log(err);
      }
    );
  }

  ngOnInit(): void {
  }

}
