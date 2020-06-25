import { Injectable } from '@angular/core';
import { Observable, throwError } from "rxjs";
import {
  HttpClient,
  HttpHeaders,
  HttpParams,
  HttpErrorResponse
} from "@angular/common/http";
import { catchError, map } from "rxjs/operators";
import { environment } from '../../environments/environment';
@Injectable({
  providedIn: 'root'
})
export class BackendApiService {
  public base_url=environment.url_api_expres; // ó url_api_php
  public token="";
  constructor(
    private http: HttpClient,
  ) {
    //this.getToken();
  }
  private handleError(error: HttpErrorResponse) {
    if (error.error instanceof ErrorEvent) {
      console.error("An error occurred:", error.error.message);
    } else {
      //console.error( `Backend returned code ${error.status}, ` + `body was: ${error.error}` );
    }
    return throwError(error);
  }
  private extractData(res: Response) {
    let body = res;
    return body || {};
  }
  public getData(url: string): Observable<any> {
    return this.http.get(this.base_url+url, this.generateheaderget(this.token)).pipe(
      map(this.extractData),
      catchError(this.handleError)
    );
  }
  public postData(url: string,form): Observable<any> {
    var params = new HttpParams({
      fromObject: form
    });
    return this.http.post(this.base_url+url, params,  this.generateheaderpost(this.token))
    .pipe(
      map(this.extractData),
      catchError(this.handleError)
    );
  }
  public postDataJson(url: string,form): Observable<any> {
    return this.http.post(this.base_url+url, form,  this.generateheaderpostjson(this.token))
    .pipe(
      map(this.extractData),
      catchError(this.handleError)
    );
  }
  public generateheaderget(token){
    var httpOptions = {
      headers: new HttpHeaders({ "Content-Type": "application/json", "Authorization": token })
    };
    return httpOptions;
  }
  public generateheaderpost(token){
    var httpOptionsPost = {
      headers: new HttpHeaders({
        'Content-Type': 'application/x-www-form-urlencoded',
        'Authorization': token,
      })
    };
    return httpOptionsPost;
  }
  public generateheaderpostjson(token){
    var httpOptionsPost = {
      headers: new HttpHeaders({
        'Content-Type': 'application/json',
        'Authorization': token,
      })
    };
    return httpOptionsPost;
  }
  public getToken(){
    if (sessionStorage.getItem("token") != null) {
      this.token=sessionStorage.getItem("token");
    }else{
      this.token="Basic";
    }
  }
  public deleteToken(){
    this.token="";
  }
}
