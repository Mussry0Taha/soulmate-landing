const api=(path,options={})=>fetch(`api/${path}`,{headers:{'Content-Type':'application/json'},...options}).then(async r=>{const data=await r.json();if(!r.ok)throw new Error(data.message||'Request failed');return data});
function showToast(message,type='success'){const toast=document.createElement('div');toast.className=`toast ${type==='error'?'error':''}`;toast.textContent=message;document.body.append(toast);setTimeout(()=>toast.remove(),3000)}
async function checkSession(){try{return (await api('get_profile.php')).user}catch{return null}}
function logout(){fetch('api/logout.php').finally(()=>location.href='login.php')}
function togglePasswordVisibility(inputId){const input=document.getElementById(inputId);if(input)input.type=input.type==='password'?'text':'password'}
function escapeHtml(v){const d=document.createElement('div');d.textContent=v??'';return d.innerHTML}
