program base2;
uses
  crt,
  Windows,   // for constant SW_NORMAL
  ShellApi;  // for function ShellExecute
var nomdb,nomtable: AnsiString;
 x:char;

procedure createdatabase(var nomdb: AnsiString);
var
  comand,projectname: AnsiString;
  si: STARTUPINFOA;
  pi: PROCESS_INFORMATION;
  i:integer;
begin
   textColor(2);
   write('miral@DESKTOP-F55SQAQ ');
   textColor(13);
   write('MINGW64 ');
   textColor(14);
   writeln('~/Desktop');
   textColor(15);
   write('Git Username : $ ');
   readln(nomdb);
   write('Project Name : $  ');
   readln(projectname);
  //change the path of the mysql.exe
  comand :='C:\AppServ\MySQL\bin\mysql.exe -uroot -pmadara1998 -e "use github;DELETE FROM project WHERE user='''+nomdb+''''+' and nameproject='''+projectname+''''+';"';
  i:=0;

  ZeroMemory(@si, sizeof(si));
  si.cb := sizeof(si);
  si.dwFlags := STARTF_USESHOWWINDOW;
  si.wShowWindow := SW_NORMAL;

  if CreateProcessA(nil, PAnsiChar(comand), nil, nil, False, 0, nil, nil, @si, @pi) then
  begin
    WaitForSingleObject(pi.hProcess, INFINITE);
    CloseHandle(pi.hThread);
    CloseHandle(pi.hProcess);
  clrscr;
  end else
  begin
    // error handling, use GetLastError() to find out why CreateProcess() failed...
  end;
end;


begin
  createdatabase(nomdb);

end.
